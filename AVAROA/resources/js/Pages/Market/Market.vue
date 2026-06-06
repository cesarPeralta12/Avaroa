<script setup>
import { ref, computed, onMounted, onUnmounted, watch, nextTick } from 'vue'
import Chart from './Chart.vue'
import PsychometricRadar from '@/Components/PsychometricRadar.vue' // ✅ Added Import
import { init as initEcho } from '@/echo.js'
import Swal from 'sweetalert2'
import axios from 'axios'
import { router } from '@inertiajs/vue3'

// ✅ CONFIG: Ensure session cookies are sent
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const props = defineProps({
  instruments: Array,
  instrument: Object,
  symbol: String,
  expiry: String,
  lotConfig: Object,
  orders: { type: Array, default: () => [] },
  positions: { type: Array, default: () => [] },
  holdings: { type: Array, default: () => [] },
  userState: { type: Object, default: () => ({}) }
})

const searchQuery = ref('')
const activeFilter = ref('all')
const selectedSymbol = ref(props.symbol || props.instrument?.symbol)
const selectedInstrument = ref(props.instrument)

// --- LIVE DATA STATE ---
// We create local copies of props so we can update LTP/PnL in real-time
const livePositions = ref([...props.positions]);
const liveHoldings = ref([...props.holdings]);

// Socket State
const echo = ref(null);
const activeChannels = ref(new Set()); // Track channels to clean up later

const isPanelExpanded = ref(true)
const activeBottomTab = ref('positions')

// --- 🔥 EXIT LOGIC ---
async function handleExit(item, type) {
    const qty = parseFloat(item.quantity || item.qty || 0);
    const avgPrice = parseFloat(item.average_price || 0);
    // Use current LTP from socket, fallback to avgPrice if no tick yet
    const currentLtp = parseFloat(item.ltp || avgPrice);

    let estimatedPnl = 0;

    // Calculate PnL based on type
    if (type === 'holding') {
        // Holdings are always Long/Buy
        estimatedPnl = (currentLtp - avgPrice) * qty;
    } else {
        // Intraday Positions
        if (item.side === 'BUY') {
            estimatedPnl = (currentLtp - avgPrice) * qty;
        } else {
            // Short Sell
            estimatedPnl = (avgPrice - currentLtp) * qty;
        }
    }

    const isProfit = estimatedPnl >= 0;
    const formattedPnl = formatPrice(estimatedPnl);

    const result = await Swal.fire({
        title: type === 'holding' ? 'Sell Holding?' : 'Close Position?',
        html: `
            <div class="text-left bg-[#111827] p-4 rounded-lg border border-gray-700 font-sans">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-400">Instrument:</span>
                    <span class="font-bold text-white">${item.symbol}</span>
                </div>
                <div class="flex justify-between mb-2">
                     <span class="text-gray-400">Exit Price:</span>
                     <span class="font-bold text-white">${formatPrice(currentLtp)}</span>
                </div>
                <div class="flex justify-between border-t border-gray-700 pt-3 mt-2">
                    <span class="text-gray-400 font-bold">Est. P&L:</span>
                    <span class="font-bold text-lg" style="color: ${isProfit ? '#10b981' : '#ef4444'}">
                        ${isProfit ? '+' : ''}₹ ${formattedPnl}
                    </span>
                </div>
            </div>
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: isProfit ? '#059669' : '#dc2626',
        cancelButtonColor: '#374151',
        confirmButtonText: 'Yes, Exit Now',
        background: '#1f2937',
        color: '#f3f4f6'
    });

    if (result.isConfirmed) {
        try {
            // Call Backend to Close Trade
            const response = await axios.post(`/trades/${item.id}/close`, {
                exit_price: currentLtp
            });

            if (response.data.success) {
                Swal.fire({
                    title: 'Exited!',
                    text: `Realized P&L: ₹${response.data.pnl}`,
                    icon: 'success',
                    background: '#1f2937',
                    color: '#f3f4f6',
                    timer: 1500,
                    showConfirmButton: false
                });

                // Reload Inertia props to refresh balance, tables, and history
                router.reload({ only: ['positions', 'holdings', 'userState', 'orders'] });
            }
        } catch (error) {
            console.error(error);
            Swal.fire({
                title: 'Error',
                text: error.response?.data?.message || 'Could not close position.',
                icon: 'error',
                background: '#1f2937',
                color: '#f3f4f6'
            });
        }
    }
}

// --- INSTRUMENT MAPPING ---
const instrumentNames = {
    'FSI-NF50': 'NIFTY 50', 'FSI-BN': 'BANK NIFTY', 'FSI-SENSEX': 'SENSEX',
    'FSI-FN': 'FIN NIFTY', 'FSI-SX': 'SENSEX', 'FSI-MIDCP': 'MIDCAP SELECT',
    'FSI-GLD': 'GOLD PETAL', 'FSI-GLDM': 'GOLD MINI', 'FSI-SLV': 'SILVER',
    'FSI-CRD': 'CRUDE OIL', 'FSI-NGS': 'NATURAL GAS', 'FSI-RLI': 'RELIANCE IND',
    'FSI-HDFC': 'HDFC BANK', 'FSI-ICBK': 'ICICI BANK', 'FSI-SBN': 'SBI',
    'FSI-INFY': 'INFOSYS', 'FSI-TCS': 'TCS', 'FSI-ADAN': 'ADANI ENT',
    'FSI-ITC': 'ITC LTD', 'FSI-LT': 'L&T', 'FSI-AXS': 'AXIS BANK',
    'FSI-KOT': 'KOTAK BANK'
};

function getInstrumentName(symbol) {
    if (instrumentNames[symbol]) return instrumentNames[symbol];
    return symbol?.replace('FSI-', '').replace(/-/g, ' ') || symbol;
}

// --- COMPUTED PROPERTIES ---
const bottomTabs = computed(() => [
    { id: 'positions', label: 'Positions', count: livePositions.value.length },
    { id: 'orders', label: 'Orders', count: props.orders.length },
    { id: 'holdings', label: 'Holdings', count: liveHoldings.value.length },
])

const filterTabs = [
  { id: 'all', label: 'All' },
  { id: 'index', label: 'Indices' },
  { id: 'stock', label: 'Stocks' },
  { id: 'commodity', label: 'Commodities' }
]

const filteredInstruments = computed(() => {
  let filtered = props.instruments || []
  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase()
    filtered = filtered.filter(inst => {
      const name = getInstrumentName(inst.symbol).toLowerCase();
      return (
        inst.symbol.toLowerCase().includes(query) ||
        inst.sector.toLowerCase().includes(query) ||
        name.includes(query)
      );
    })
  }
  if (activeFilter.value !== 'all') {
    filtered = filtered.filter(inst => inst.category === activeFilter.value)
  }
  return filtered
})

const filteredCategories = computed(() => {
  const categories = {}
  filteredInstruments.value.forEach(inst => {
    if (!categories[inst.category]) categories[inst.category] = []
    categories[inst.category].push(inst)
  })
  return Object.entries(categories).map(([name, instruments]) => ({
    name: name.charAt(0).toUpperCase() + name.slice(1),
    instruments: instruments.sort((a, b) => a.symbol.localeCompare(b.symbol))
  }))
})

// --- 🔥 REAL-TIME SOCKETS ---

function setupSockets() {
    // 1. Initialize Echo if needed
    if (!echo.value) {
        echo.value = initEcho();
    }

    // 2. Unsubscribe from old channels to prevent duplicates
    activeChannels.value.forEach(channel => {
        echo.value.leave(channel);
    });
    activeChannels.value.clear();

    // 3. Find unique symbols in Holdings and Positions
    const symbolsToWatch = new Set([
        ...liveHoldings.value.map(h => h.symbol),
        ...livePositions.value.map(p => p.symbol)
    ]);

    if(symbolsToWatch.size === 0) return;

    console.log("📡 Connecting sockets for:", Array.from(symbolsToWatch));

    // 4. Subscribe
    symbolsToWatch.forEach(symbol => {
        let channelName = `market.underlying.${symbol}`;
        // Adjust channel naming convention based on your backend events
        if (symbol.includes('-F-')) channelName = `market.futures.${symbol}`;
        else if (symbol.includes('-C-') || symbol.includes('-P-')) channelName = `market.options.${symbol}`;

        echo.value.channel(channelName)
            .listen('.TickUpdated', (e) => {
                updatePnl(symbol, Number(e.price));
            });

        activeChannels.value.add(channelName);
    });
}

function updatePnl(symbol, rawPrice) {
    const price = parseFloat(rawPrice);
    if(isNaN(price)) return;

    // Update Holdings
    liveHoldings.value.forEach(hold => {
        if (hold.symbol === symbol) {
            hold.ltp = price;
            // Holdings PnL = (Current - Avg) * Qty
            hold.pnl = (price - parseFloat(hold.average_price)) * parseFloat(hold.quantity);
        }
    });

    // Update Positions
    livePositions.value.forEach(pos => {
        if (pos.symbol === symbol && pos.is_open) {
            pos.ltp = price;
            const avg = parseFloat(pos.average_price);
            const qty = parseFloat(pos.quantity);

            // Position PnL Logic
            if (pos.side === 'BUY') {
                pos.pnl = (price - avg) * qty;
            } else {
                pos.pnl = (avg - price) * qty;
            }
        }
    });
}

// Watch props: If backend sends new data (e.g. after trade/reload), sync local state and reset sockets
watch(() => [props.holdings, props.positions], () => {
    liveHoldings.value = [...props.holdings];
    livePositions.value = [...props.positions];
    nextTick(() => {
        setupSockets();
    });
}, { deep: true });

// --- FORMATTING HELPERS ---
function getInstrumentColor(category) {
  const colors = {
    index: 'bg-gradient-to-br from-blue-500/20 to-blue-600/20 text-blue-300',
    stock: 'bg-gradient-to-br from-green-500/20 to-emerald-600/20 text-green-300',
    commodity: 'bg-gradient-to-br from-yellow-500/20 to-amber-600/20 text-yellow-300',
    default: 'bg-gradient-to-br from-gray-500/20 to-gray-600/20 text-gray-300'
  }
  return colors[category] || colors.default
}

function getInstrumentIcon(category) {
  const icons = { index: '📈', stock: '💹', commodity: '⚖️', default: '📊' }
  return icons[category] || icons.default
}

function getVolatilityClass(volatility) {
  const classes = {
    low:       'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
    medium:    'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
    high:      'bg-orange-500/10 text-orange-400 border-orange-500/20',
    very_high: 'bg-rose-500/10 text-rose-400 border-rose-500/20',
    default:   'bg-gray-800 text-gray-400 border-gray-700'
  }
  return classes[volatility] || classes.default
}

function formatVolatility(volatility) {
    if(!volatility) return '-';
    return volatility.replace('_', ' ');
}

function getStatusClass(status) {
    const s = status ? status.toUpperCase() : '';
    if(s === 'EXECUTED' || s === 'COMPLETE') return 'bg-green-500/20 text-green-400 border border-green-500/30';
    if(s === 'REJECTED' || s === 'CANCELLED') return 'bg-red-500/20 text-red-400 border border-red-500/30';
    if(s === 'OPEN' || s === 'PENDING') return 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30';
    return 'bg-gray-700 text-gray-300';
}

function formatPrice(price) {
  if (price === null || price === undefined || isNaN(price)) return '0.00'
  const num = parseFloat(price)
  return num.toLocaleString('en-IN', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  })
}

function formatCompact(num) {
    if (!num) return '0'
    const n = parseFloat(num)
    if (n >= 10000000) return (n / 10000000).toFixed(1).replace('.0', '') + 'Cr'
    if (n >= 100000) return (n / 100000).toFixed(0) + 'L'
    if (n >= 1000) return (n / 1000).toFixed(0) + 'k'
    return n
}

function switchInstrument(inst) {
  selectedSymbol.value = inst.symbol
  selectedInstrument.value = inst
}

// --- LIFECYCLE ---
onMounted(() => {
  setupSockets();
  // Select first instrument if none selected
  if (!selectedInstrument.value && filteredInstruments.value.length > 0) {
    selectedInstrument.value = filteredInstruments.value[0]
    selectedSymbol.value = selectedInstrument.value.symbol
  }
})

onUnmounted(() => {
    if (echo.value) {
        activeChannels.value.forEach(ch => echo.value.leave(ch));
        echo.value.disconnect();
    }
})
</script>

<template>
  <div class="h-screen bg-gray-950 text-gray-100 flex overflow-hidden font-sans">

    <aside class="w-80 border-r border-gray-800 flex flex-col bg-gray-900/50 backdrop-blur-sm">
      <div class="p-6 border-b border-gray-800">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">{{ userState?.name }}</div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-cyan-300 bg-clip-text text-transparent">{{ userState?.plan_title || 'Trading Dashboard' }}</h1>
            <div class="flex items-center justify-between mt-1 w-full gap-4">
               <span class="text-xs text-gray-400 font-mono bg-gray-800 px-1.5 py-0.5 rounded">Cap: {{ formatCompact(userState?.capital || 0) }}</span>
               <span class="text-sm font-mono font-bold text-green-400">₹ {{ formatPrice(userState?.account_balance || 0) }}</span>
            </div>
          </div>
          <div class="relative mb-4">
            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <div class="absolute inset-0 bg-green-400 rounded-full animate-ping opacity-75"></div>
          </div>
        </div>

        <div class="mt-6">
          <div class="relative">
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input v-model="searchQuery" type="text" placeholder="Search instruments..." class="w-full pl-10 pr-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-500 text-sm"/>
          </div>
        </div>

        <div class="mt-4 flex space-x-1">
          <button v-for="tab in filterTabs" :key="tab.id" @click="activeFilter = tab.id" :class="['px-3 py-1.5 text-sm rounded-lg transition-all duration-200', activeFilter === tab.id ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800']">{{ tab.label }}</button>
        </div>
      </div>

      <div class="flex-1 overflow-y-auto custom-scrollbar">
        <div class="p-4">
          <template v-for="category in filteredCategories" :key="category.name">
            <div class="mb-4">
              <div class="flex items-center justify-between mb-2 px-2">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ category.name }}</h3>
                <span class="text-xs text-gray-600 bg-gray-800 px-2 py-0.5 rounded">{{ category.instruments.length }}</span>
              </div>
              <div class="space-y-1">
                <div v-for="inst in category.instruments" :key="inst.id" @click="switchInstrument(inst)" :class="['group p-3 rounded-xl cursor-pointer transition-all duration-200', 'hover:bg-gray-800/50 hover:shadow-lg', 'border border-transparent hover:border-gray-700', inst.symbol === selectedSymbol ? 'bg-gradient-to-r from-blue-900/30 to-cyan-900/20 border-blue-500/30 shadow-lg' : 'bg-gray-800/30']">

                  <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-3 flex-1 min-w-0">
                      <div :class="['w-10 h-10 rounded-lg flex items-center justify-center shrink-0', getInstrumentColor(inst.category)]">
                        <span class="text-lg font-bold">{{ getInstrumentIcon(inst.category) }}</span>
                      </div>
                      <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                          <span class="font-semibold text-white truncate">{{ inst.symbol }}</span>
                          <div :class="['px-1.5 py-[1px] rounded text-[9px] font-bold uppercase tracking-wide border flex items-center gap-1 whitespace-nowrap', getVolatilityClass(inst.volatility_class)]">
                            {{ formatVolatility(inst.volatility_class) }}
                          </div>
                        </div>
                        <p class="text-sm text-gray-300 font-medium mt-0.5 truncate">{{ getInstrumentName(inst.symbol) }}</p>
                      </div>
                    </div>
                    <div class="text-right shrink-0">
                      <div class="font-mono font-bold text-lg leading-tight">{{ formatPrice(inst.base_price) }}</div>
                      <div class="text-xs text-gray-400 mt-0.5">Lot: {{ inst.lot_size }}</div>
                    </div>
                  </div>

                  <div class="mt-2 pt-2 border-t border-gray-800/50 flex items-center justify-between text-xs">
                    <div class="flex items-center space-x-4">
                      <div class="flex items-center space-x-1 text-gray-400">
                        <span>{{ inst.session_start?.slice(0, 5) }} - {{ inst.session_end?.slice(0, 5) }}</span>
                      </div>
                    </div>
                    <div v-if="inst.is_active" class="flex items-center">
                      <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5 animate-pulse"></div>
                      <span class="text-green-500 font-bold text-[10px] uppercase tracking-wide">Live</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </template>

          <div class="mt-6 pt-6 border-t border-gray-800">
             <PsychometricRadar :user="userState" />
          </div>
        </div>
      </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden relative">
      <div class="border-b border-gray-800 bg-gray-900/50 backdrop-blur-sm shrink-0">
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center space-x-4">
            <div :class="['w-10 h-10 rounded-xl flex items-center justify-center text-2xl', selectedInstrument ? getInstrumentColor(selectedInstrument.category) : 'bg-gray-800']">
              {{ selectedInstrument ? getInstrumentIcon(selectedInstrument.category) : '📊' }}
            </div>
            <div>
              <div class="flex items-center space-x-3">
                <h2 class="text-2xl font-bold">{{ selectedSymbol || 'Select Instrument' }}</h2>
                <div class="flex items-center space-x-2">
                  <div v-if="selectedInstrument" :class="['px-3 py-0.5 rounded-md text-xs font-bold uppercase border flex items-center gap-1.5', getVolatilityClass(selectedInstrument.volatility_class)]">
                      {{ formatVolatility(selectedInstrument.volatility_class) }}
                  </div>
                </div>
              </div>
              <p class="text-sm text-gray-400" v-if="selectedInstrument">{{ getInstrumentName(selectedInstrument.symbol) }}</p>
            </div>
          </div>
          <div v-if="selectedInstrument" class="text-right flex gap-6">
             <div><span class="block text-xl font-mono font-bold text-green-400">{{ formatPrice(selectedInstrument.base_price) }}</span><span class="text-[10px] text-gray-400 uppercase">Base Price</span></div>
             <div><span class="block text-lg font-mono font-bold">{{ selectedInstrument.lot_size }}</span><span class="text-[10px] text-gray-400 uppercase">Lot Size</span></div>
          </div>
        </div>
      </div>

      <div class="flex-1 overflow-hidden relative bg-[#131722]">
        <div v-if="selectedSymbol" class="h-full">
          <Chart
            :key="selectedSymbol + expiry"
            :symbol="selectedSymbol"
            :expiry="expiry"
            :instrument="selectedInstrument"
            :user-state="userState"
            :lot-config="lotConfig"
          />
        </div>
        <div v-else class="h-full flex flex-col items-center justify-center text-gray-500">
          <h3 class="text-2xl font-semibold mb-2">Select an Instrument</h3>
        </div>
      </div>

      <div :class="['border-t border-gray-800 bg-[#1e222d] flex flex-col transition-all duration-300 ease-in-out', isPanelExpanded ? 'h-80' : 'h-10']">
        <div class="flex items-center justify-between bg-[#2a2e39] px-2 h-10 shrink-0">
          <div class="flex space-x-1 h-full pt-1">
            <button
              v-for="tab in bottomTabs"
              :key="tab.id"
              @click="activeBottomTab = tab.id; isPanelExpanded = true"
              :class="['px-4 text-xs font-bold uppercase tracking-wider flex items-center h-full rounded-t-md transition-colors',
                activeBottomTab === tab.id
                ? 'bg-[#1e222d] text-blue-400 border-t-2 border-blue-500'
                : 'text-gray-400 hover:text-gray-200 hover:bg-[#363a45]'
              ]"
            >
              {{ tab.label }}
              <span v-if="tab.count > 0" class="ml-2 bg-gray-700 text-white px-1.5 rounded-full text-[10px]">{{ tab.count }}</span>
            </button>
          </div>

          <button @click="isPanelExpanded = !isPanelExpanded" class="text-gray-400 hover:text-white p-1">
            <svg v-if="isPanelExpanded" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>
          </button>
        </div>

        <div v-if="isPanelExpanded" class="flex-1 overflow-auto custom-scrollbar p-0">

          <div v-if="activeBottomTab === 'positions'">
            <table class="w-full text-left text-xs">
              <thead class="bg-[#131722] text-gray-400 sticky top-0 z-10 font-bold">
                <tr>
                  <th class="p-3">Instrument</th>
                  <th class="p-3 text-right">Qty</th>
                  <th class="p-3 text-right">Avg. Price</th>
                  <th class="p-3 text-right">LTP</th>
                  <th class="p-3 text-center">Side</th>
                  <th class="p-3 text-right">P&L</th>
                  <th class="p-3 text-right">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <tr v-for="pos in livePositions" :key="pos.id" class="hover:bg-[#2a2e39]/50 transition">
                  <td class="p-3 font-bold text-white">
                    {{ pos.symbol }}
                    <span :class="pos.product === 'MIS' ? 'text-orange-400' : 'text-blue-400'" class="text-[9px] border border-gray-700 px-1 rounded ml-2">{{ pos.product }}</span>
                  </td>
                  <td class="p-3 text-right" :class="pos.quantity > 0 ? 'text-green-400' : 'text-red-400'">{{ pos.quantity }}</td>
                  <td class="p-3 text-right text-gray-300">{{ formatPrice(pos.average_price) }}</td>
                  <td class="p-3 text-right text-white">{{ formatPrice(pos.ltp || 0) }}</td>
                  <td class="p-3 text-center">
                    <span :class="pos.side === 'BUY' ? 'text-green-400 bg-green-500/10' : 'text-red-400 bg-red-500/10'" class="px-1.5 py-0.5 rounded text-[10px] font-bold">{{ pos.side }}</span>
                  </td>
                  <td class="p-3 text-right font-bold" :class="(pos.pnl || 0) >= 0 ? 'text-green-400' : 'text-red-400'">
                    {{ (pos.pnl || 0) >= 0 ? '+' : '' }}₹ {{ formatPrice(pos.pnl || 0) }}
                  </td>
                  <td class="p-3 text-right">
                    <button v-if="pos.is_open"
                            @click="handleExit(pos, 'position')"
                            class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white border border-red-500/20 px-3 py-1 rounded text-[10px] font-bold transition uppercase tracking-wider">
                      Exit
                    </button>
                    <span v-else class="text-gray-500 italic text-[10px]">Closed</span>
                  </td>
                </tr>
                <tr v-if="livePositions.length === 0">
                    <td colspan="7" class="p-8 text-center text-gray-500 italic">No open positions</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div v-if="activeBottomTab === 'orders'">
            <table class="w-full text-left text-xs">
              <thead class="bg-[#131722] text-gray-400 sticky top-0 z-10 font-bold">
                <tr>
                  <th class="p-3">Time</th>
                  <th class="p-3">Type</th>
                  <th class="p-3">Instrument</th>
                  <th class="p-3">Product</th>
                  <th class="p-3 text-right">Qty</th>
                  <th class="p-3 text-right">Price</th>
                  <th class="p-3 text-center">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <tr v-for="order in orders" :key="order.id" class="hover:bg-[#2a2e39]/50 transition">
                  <td class="p-3 text-gray-400">{{ order.time }}</td>
                  <td class="p-3">
                    <span :class="order.side === 'BUY' ? 'bg-blue-500/10 text-blue-400 border-blue-500/30' : 'bg-red-500/10 text-red-400 border-red-500/30'" class="px-1.5 py-0.5 border rounded text-[10px] font-bold">{{ order.side }}</span>
                    <span class="ml-1 text-[9px] text-gray-500">{{ order.type }}</span>
                  </td>
                  <td class="p-3 font-bold text-white">{{ order.symbol }}</td>
                  <td class="p-3 text-gray-300">{{ order.product }}</td>
                  <td class="p-3 text-right text-white">{{ order.qty }}</td>
                  <td class="p-3 text-right text-gray-300">{{ formatPrice(order.price) }}</td>
                  <td class="p-3 text-center">
                    <span :class="getStatusClass(order.status)" class="px-2 py-0.5 rounded text-[10px] font-bold">{{ order.status }}</span>
                  </td>
                </tr>
                 <tr v-if="orders.length === 0">
                    <td colspan="7" class="p-8 text-center text-gray-500 italic">No recent orders</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div v-if="activeBottomTab === 'holdings'">
             <table class="w-full text-left text-xs">
              <thead class="bg-[#131722] text-gray-400 sticky top-0 z-10 font-bold">
                <tr>
                  <th class="p-3">Instrument</th>
                  <th class="p-3 text-right">Qty</th>
                  <th class="p-3 text-right">Avg. Cost</th>
                  <th class="p-3 text-right">LTP</th>
                  <th class="p-3 text-right">Cur. Value</th>
                  <th class="p-3 text-right">P&L</th>
                  <th class="p-3 text-right">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <tr v-for="hold in liveHoldings" :key="hold.id" class="hover:bg-[#2a2e39]/50 transition">
                  <td class="p-3 font-bold text-white">{{ hold.symbol }}</td>
                  <td class="p-3 text-right text-white">{{ hold.quantity }}</td>
                  <td class="p-3 text-right text-gray-400">{{ formatPrice(hold.average_price) }}</td>
                  <td class="p-3 text-right text-white">{{ formatPrice(hold.ltp) }}</td>
                  <td class="p-3 text-right text-white">{{ formatPrice(hold.quantity * (hold.ltp || 0)) }}</td>
                  <td class="p-3 text-right font-bold" :class="(hold.pnl || 0) >= 0 ? 'text-green-400' : 'text-red-400'">
                    {{ (hold.pnl || 0) >= 0 ? '+' : '' }}{{ formatPrice(hold.pnl || 0) }}
                  </td>
                  <td class="p-3 text-right">
                    <button @click="handleExit(hold, 'holding')"
                            class="bg-orange-500/10 hover:bg-orange-500 text-orange-500 hover:text-white border border-orange-500/20 px-3 py-1 rounded text-[10px] font-bold transition uppercase tracking-wider">
                      Sell
                    </button>
                  </td>
                </tr>
                 <tr v-if="liveHoldings.length === 0">
                    <td colspan="7" class="p-8 text-center text-gray-500 italic">No holdings found</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
::-webkit-scrollbar { width: 6px; height: 6px; }
::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); border-radius: 3px; }
::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 3px; }
::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.2); }
.group { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
</style>
