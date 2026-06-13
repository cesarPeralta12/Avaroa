@php
    $stateClass = match(true) {
        in_array($conv->state, ['COMPLETED'])                                                              => 'sb-green',
        in_array($conv->state, ['CANCELLED'])                                                              => 'sb-red',
        in_array($conv->state, ['SEARCHING_DRIVER'])                                                       => 'sb-yellow',
        in_array($conv->state, ['DRIVER_ASSIGNED','DRIVER_EN_ROUTE','ARRIVED','IN_PROGRESS'])              => 'sb-orange',
        default                                                                                            => 'sb-blue',
    };
@endphp
<tr class="conv-row {{ $conv->escalated_to_human ? 'is-escalated' : '' }}"
    data-id="{{ $conv->id }}"
    onclick="window.location='{{ route('whatsapp.show', $conv->id) }}'">
    <td class="ps-4">
        <div class="d-flex align-items-center gap-2">
            <div class="avatar-circle">
                {{ strtoupper(substr($conv->customer?->name ?? '?', 0, 1)) }}
            </div>
            <div>
                <div style="font-weight:600;font-size:.88rem;">
                    {{ $conv->customer?->name ?? 'Desconocido' }}
                </div>
                @if($conv->escalated_to_human)
                    <span class="badge" style="background:#fee2e2;color:#991b1b;font-size:.65rem;">⚠ Atención</span>
                @endif
            </div>
        </div>
    </td>
    <td>
        <span class="wa-phone">
            {{ $conv->customer?->whatsapp_number ?? $conv->customer?->phone ?? '—' }}
        </span>
    </td>
    <td>
        <span class="sb {{ $stateClass }}">{{ str_replace('_', ' ', $conv->state) }}</span>
    </td>
    <td>
        @if($conv->trip_id)
            <span style="background:#ede9fe;color:#5c61f2;padding:4px 10px;border-radius:50px;font-size:.72rem;font-weight:600;"
                  onclick="event.stopPropagation()">
                #{{ $conv->trip_id }}
            </span>
        @else
            <span class="text-muted">—</span>
        @endif
    </td>
    <td>
        <span class="last-msg-time" style="font-size:.8rem;">
            {{ $conv->last_message_at?->diffForHumans() ?? $conv->updated_at->diffForHumans() }}
        </span>
    </td>
    <td>
        <span style="font-size:.8rem;color:#94a3b8;">
            {{ $conv->created_at->format('d/m H:i') }}
        </span>
    </td>
    <td class="text-center pe-4" onclick="event.stopPropagation()">
        <a href="{{ route('whatsapp.show', $conv->id) }}"
           class="btn btn-sm btn-outline-success me-1" title="Ver chat">
            <i class="fas fa-comments"></i>
        </a>
        <button onclick="deleteConv({{ $conv->id }}, event)"
                class="btn btn-sm btn-outline-danger" title="Eliminar">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>
