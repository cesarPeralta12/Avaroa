<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { Radar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  RadialLinearScale,
  PointElement,
  LineElement,
  Filler,
  Tooltip,
  Legend,
} from 'chart.js';
import { init as initEcho } from '@/echo.js';
import axios from 'axios';

ChartJS.register(RadialLinearScale, PointElement, LineElement, Filler, Tooltip, Legend);

const props = defineProps(['user']);

const state = ref({
  confidence: 0,
  fear: 0,
  discipline: 0,
  aggression: 0
});

const explanation = ref('');
const loading = ref(true);
let echo = null;

const fetchPsychometrics = async () => {
  try {
    const { data } = await axios.get('/api/psychometrics');
    // Mapping based on your PsychometricController::overview
    state.value = data.current_state || state.value;
    explanation.value = data.explanation || '';
    loading.value = false;
  } catch (error) {
    console.error("Data fetch error", error);
  }
};

// 📡 Listen for live updates from RunPsychometrics engine
const initSocket = () => {
    echo = initEcho();
    echo.private(`user.psychometrics.${props.user.id}`)
        .listen('.PsychometricUpdated', (e) => {
            state.value = e.state;
            explanation.value = e.explanation;
        });
};

onMounted(() => {
  fetchPsychometrics();
  if (props.user?.id) initSocket();
});

onUnmounted(() => {
    if (echo) echo.disconnect();
});

const chartData = computed(() => ({
  labels: ['Confidence', 'Fear', 'Discipline', 'Aggression'],
  datasets: [{
    label: 'Trader Behavior',
    backgroundColor: 'rgba(59, 130, 246, 0.2)',
    borderColor: '#3b82f6',
    pointBackgroundColor: '#3b82f6',
    data: [
      state.value.confidence * 100,
      state.value.fear * 100,
      state.value.discipline * 100,
      state.value.aggression * 100
    ],
  }],
}));

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    r: {
      grid: { color: '#374151' },
      angleLines: { color: '#374151' },
      suggestedMin: 0,
      suggestedMax: 100,
      ticks: { display: false },
      pointLabels: { color: '#9ca3af', font: { size: 10 } }
    }
  },
  plugins: { legend: { display: false } }
};
</script>

<template>
  <div class="bg-[#1e222d] border border-[#363a45] rounded-xl p-4 flex flex-col h-full overflow-hidden">
    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-tighter mb-4">Behavioral Analytics</h3>

    <div class="flex-1 min-h-[200px]">
      <Radar :data="chartData" :options="chartOptions" />
    </div>

    <div class="mt-4 bg-[#131722] p-3 rounded-lg border border-[#2a2e39]">
      <div class="flex items-center gap-2 mb-2">
        <span class="text-[10px] bg-blue-500/20 text-blue-400 px-1.5 py-0.5 rounded font-bold">AI INSIGHT</span>
      </div>
      <p class="text-[11px] text-gray-300 leading-relaxed italic">
        "{{ explanation || 'Keep trading to generate psychological insights...' }}"
      </p>
    </div>
  </div>
</template>
