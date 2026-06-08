@extends('layout.master')
@section('title')
    Gestión de Viajes
@endsection

@section('css')
    <style>
        /* Driver Modal Styles */
        .driver-modal .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }
        .driver-modal .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-bottom: none;
            padding: 2rem;
            position: relative;
        }
        .driver-modal .modal-title {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .driver-modal .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }
        .driver-modal .modal-body {
            padding: 0;
        }
        /* Driver Profile Section */
        .driver-profile {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 2rem;
            text-align: center;
            position: relative;
        }
        /* dark override moved to avaroa-admin.css */
        .driver-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .driver-avatar-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            border: 5px solid white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            margin: 0 auto 1rem;
        }
        .driver-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }
        .driver-role {
            color: #718096;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        /* dark overrides in avaroa-admin.css */
        .driver-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-top: 1rem;
        }
        .driver-status-badge.online {
            background: #c6f6d5;
            color: #22543d;
        }
        .driver-status-badge.offline {
            background: #fed7d7;
            color: #742a2a;
        }
        /* dark overrides in avaroa-admin.css */
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        .online .status-dot {
            background: #48bb78;
        }
        .offline .status-dot {
            background: #f56565;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        /* Info Cards */
        .info-section {
            padding: 2rem;
        }
        .info-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .info-card-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e2e8f0;
        }
        .info-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        .info-card-icon.contact { background: #ebf8ff; color: #3182ce; }
        .info-card-icon.vehicle { background: #f0fff4; color: #38a169; }
        .info-card-icon.stats   { background: #faf5ff; color: #805ad5; }
        /* dark overrides for all .info-card-icon.* in avaroa-admin.css */
        .info-card-title {
            font-weight: 700;
            color: #2d3748;
            font-size: 1.125rem;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        .info-label {
            font-size: 0.75rem;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }
        .info-value {
            font-size: 1rem;
            color: #2d3748;
            font-weight: 600;
        }
        .info-value.phone {
            color: #3182ce;
            text-decoration: none;
        }
        .info-value.phone:hover {
            text-decoration: underline;
        }
        /* Vehicle Card Special Styling */
        .vehicle-card {
            background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%);
            border: 2px solid #9ae6b4;
        }
        .vehicle-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
        .vehicle-placeholder {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #38a169;
            margin-bottom: 1rem;
        }
        .vehicle-plate {
            display: inline-block;
            background: #2d3748;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-family: monospace;
            font-weight: bold;
            font-size: 1.125rem;
            letter-spacing: 0.1em;
        }
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .stat-box {
            text-align: center;
            padding: 1rem;
            background: white;
            border-radius: 12px;
        }
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }
        .stat-label {
            font-size: 0.75rem;
            color: #718096;
            margin-top: 0.25rem;
        }
        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 0.75rem;
            padding: 1.5rem 2rem;
            background: #f7fafc;
            border-top: 1px solid #e2e8f0;
        }
        .btn-action {
            flex: 1;
            padding: 0.875rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-action.whatsapp {
            background: #25d366;
            color: white;
        }
        .btn-action.whatsapp:hover {
            background: #128c7e;
            transform: translateY(-2px);
        }
        .btn-action.call {
            background: #3182ce;
            color: white;
        }
        .btn-action.call:hover {
            background: #2c5282;
            transform: translateY(-2px);
        }
        .btn-action.track {
            background: #ed8936;
            color: white;
        }
        .btn-action.track:hover {
            background: #c05621;
            transform: translateY(-2px);
        }
        /* Trip Row Driver Cell */
        .driver-cell {
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        .driver-cell:hover {
            background: #ebf8ff !important;
            transform: scale(1.02);
        }
        .driver-cell::after {
            content: '\f06e';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.2s;
            color: #3182ce;
        }
        .driver-cell:hover::after {
            opacity: 1;
        }
        .driver-mini {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .driver-mini-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        .driver-mini-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.75rem;
            font-weight: bold;
        }
        .driver-mini-info {
            display: flex;
            flex-direction: column;
        }
        .driver-mini-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.875rem;
        }
        .driver-mini-vehicle {
            font-size: 0.75rem;
            color: #718096;
        }
        /* Empty State */
        .empty-driver {
            color: #a0aec0;
            font-style: italic;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
            .quick-actions {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('main_content')
    <div class="page-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('fail') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de Viajes</h4>
                    <!--<a href="{{ route('trips.create') }}" class="btn btn-success btn-sm">-->
                    <!--    <i class="fas fa-plus"></i> Crear Orden-->
                    <!--</a>-->
                </div>
                <div class="card-body">
                    {{-- BULK DELETE --}}
                    <button class="btn btn-danger mb-3 bulk-delete-btn" data-url="{{ route('trips.bulk.delete') }}">
                        <i class="fas fa-trash"></i> Eliminar Seleccionados
                    </button>

                    <div class="table-responsive">
                        <table id="basic-1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Estado</th>
                                    <th>Conductor y Vehículo</th>
                                    <th>Creado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trips as $trip)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="row-checkbox" value="{{ $trip->id }}">
                                        </td>
                                        <td>{{ $trip->id }}</td>
                                        <td>{{ $trip->customer?->name ?? '—' }}</td>
                                        <td>{{ $trip->service_type }}</td>
                                        <td>
                                            <span class="badge bg-{{ $trip->status_color ?? 'secondary' }}">
                                                {{ $trip->status }}
                                            </span>
                                        </td>
                                        {{-- Driver Cell with Modal Trigger --}}
                                        <td class="driver-cell" data-bs-toggle="modal"
                                            data-bs-target="#driverModal{{ $trip->id }}">
                                            @if ($trip->driver && $trip->driver->user)
                                                @php
                                                    $driverUser = $trip->driver->user;
                                                    $vehicle = $trip->driver->vehicles->first();
                                                @endphp
                                                <div class="driver-mini">
                                                    {{-- Profile Photo --}}
                                                    @if ($driverUser->profile_photo ?? false)
                                                        <img src="{{ asset('storage/' . $driverUser->profile_photo) }}"
                                                            class="driver-mini-avatar" alt="{{ $driverUser->name }}">
                                                    @else
                                                        <div class="driver-mini-placeholder">
                                                            {{ strtoupper(substr($driverUser->name, 0, 1)) }}
                                                        </div>
                                                    @endif
                                                    {{-- Driver Info --}}
                                                    <div class="driver-mini-info">
                                                        <span class="driver-mini-name">
                                                            {{ $driverUser->name }}
                                                        </span>
                                                        <span class="driver-mini-vehicle">
                                                            @if ($vehicle)
                                                                {{ $vehicle->type }} • {{ $vehicle->plate_number }}
                                                            @else
                                                                Sin vehículo asignado
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="empty-driver">— Sin conductor asignado —</span>
                                            @endif
                                        </td>
                                        <td>{{ $trip->created_at->diffForHumans() }}</td>
                                        <td>
                                            <!--<a href="{{ route('trips.edit', $trip) }}" class="btn btn-sm btn-info" title="Editar">-->
                                            <!--    <i class="fas fa-edit"></i>-->
                                            <!--</a>-->
                                            <button class="btn btn-sm btn-danger btn-delete-ajax"
                                                data-url="{{ route('trips.destroy', $trip) }}" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-muted">
                                            No se encontraron viajes.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Driver Detail Modals --}}
    @foreach ($trips as $trip)
    @if ($trip->driver && $trip->driver->user)
        @php
            $driver = $trip->driver;
            $driverUser = $driver->user;
            $vehicle = $driver->vehicles->first();
            $isOnline = $driver->is_online ?? false;
        @endphp

        <div class="modal fade driver-modal" id="driverModal{{ $trip->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    {{-- Header --}}
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-id-card me-2"></i>
                            Información del Conductor
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Driver Profile --}}
                        <div class="driver-profile">
                            @if ($driverUser->profile_photo ?? false)
                                <img src="{{ asset('storage/' . $driverUser->profile_photo) }}"
                                     class="driver-avatar"
                                     alt="{{ $driverUser->name }}">
                            @else
                                <div class="driver-avatar-placeholder">
                                    {{ strtoupper(substr($driverUser->name, 0, 1)) }}
                                </div>
                            @endif
                            <h3 class="driver-name">{{ $driverUser->name }}</h3>
                            <span class="driver-role">Conductor Profesional</span>
                            <div class="driver-status-badge {{ $isOnline ? 'online' : 'offline' }}">
                                <span class="status-dot"></span>
                                {{ $isOnline ? 'En Línea Ahora' : 'Fuera de Línea' }}
                            </div>
                        </div>

                        {{-- Info Section --}}
                        <div class="info-section">
                            {{-- Contact Info --}}
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon contact">
                                        <i class="fas fa-address-book"></i>
                                    </div>
                                    <h4 class="info-card-title">Información de Contacto</h4>
                                </div>
                                <div class="info-grid">
                                    <div class="info-item">
                                        <span class="info-label">Teléfono</span>
                                        <a href="tel:{{ $driverUser->phone ?? $driverUser->whatsapp_number }}"
                                           class="info-value phone">
                                            {{ $driverUser->phone ?? $driverUser->whatsapp_number ?? 'N/A' }}
                                        </a>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">WhatsApp</span>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $driverUser->whatsapp_number) }}"
                                           target="_blank"
                                           class="info-value phone">
                                            {{ $driverUser->whatsapp_number ?? 'N/A' }}
                                        </a>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Correo Electrónico</span>
                                        <span class="info-value">{{ $driverUser->email ?? 'N/A' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Miembro Desde</span>
                                        <span class="info-value">
                                            {{ $driverUser->created_at?->format('M Y') ?? 'N/A' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Vehicle --}}
                            @if ($vehicle)
                                <div class="info-card vehicle-card">
                                    <div class="info-card-header">
                                        <div class="info-card-icon vehicle">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <h4 class="info-card-title">Detalles del Vehículo</h4>
                                    </div>
                                    @if ($vehicle->photo)
                                        <img src="{{ asset('storage/' . $vehicle->photo) }}" class="vehicle-image">
                                    @endif
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <span class="info-label">Tipo</span>
                                            <span class="info-value">{{ $vehicle->type }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Placa</span>
                                            <span class="vehicle-plate">{{ $vehicle->plate_number }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Stats --}}
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon stats">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <h4 class="info-card-title">Estadísticas de Viajes</h4>
                                </div>
                                <div class="stats-grid">
                                    <div class="stat-box">
                                        <div class="stat-value">{{ $driver->trips?->count() ?? 0 }}</div>
                                        <div class="stat-label">Total</div>
                                    </div>
                                    <div class="stat-box">
                                        <div class="stat-value">
                                            {{ $driver->trips?->where('status','completed')->count() ?? 0 }}
                                        </div>
                                        <div class="stat-label">Completados</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Quick Actions --}}
                        <div class="quick-actions">
                            @if ($driverUser->whatsapp_number)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $driverUser->whatsapp_number) }}"
                                   target="_blank"
                                   class="btn-action whatsapp">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            @endif
                            <a href="tel:{{ $driverUser->phone ?? $driverUser->whatsapp_number }}"
                               class="btn-action call">
                                <i class="fas fa-phone"></i> Llamar
                            </a>
                            <button type="button"
                                    class="btn-action track"
                                    onclick="trackDriver({{ $driver->id }})">
                                <i class="fas fa-map-marker-alt"></i> Rastrear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
@endsection

@section('js')
    <script>
        // Rastrear conductor
        function trackDriver(driverId) {
            Swal.fire({
                title: 'Localizando Conductor...',
                text: 'Obteniendo ubicación en tiempo real',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Simulación - reemplazar con tu lógica real de tracking
            setTimeout(() => {
                Swal.fire({
                    icon: 'info',
                    title: 'Ubicación del Conductor',
                    text: 'El rastreo del conductor se abriría aquí. Implementa con tu sistema GPS.',
                    confirmButtonText: 'Cerrar'
                });
            }, 1500);
        }

        // Initialize DataTable
        $(document).ready(function() {
            $('#basic-1').DataTable({
                responsive: true,
                pageLength: 25,
                order: [[0, 'desc']],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar viajes...",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "No hay registros disponibles",
                    zeroRecords: "No se encontraron resultados",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                }
            });
        });
    </script>
@endsection