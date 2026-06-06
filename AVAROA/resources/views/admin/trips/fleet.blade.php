@extends('layout.master')

@section('title', 'Fleet Overview')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <!-- Map - takes most of the space -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Live Fleet Map</h4>
                    </div>
                    <div class="card-body p-0">
                        <div id="fleetMap" style="height: 550px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <!-- Sidebar list of drivers -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Active Drivers ({{ $drivers->count() }})</h4>
                    </div>
                    <div class="card-body" style="max-height: 550px; overflow-y: auto;">
                        <div class="list-group">
                            @forelse($drivers as $driver)
                                @if($driver->current_lat && $driver->current_long)
                                    <a href="#" class="list-group-item list-group-item-action driver-item"
                                       data-lat="{{ $driver->current_lat }}"
                                       data-lng="{{ $driver->current_long }}"
                                       data-name="{{ $driver->user?->name ?? 'Unknown' }}"
                                       data-status="{{ ucfirst($driver->status) }}"
                                       data-online="{{ $driver->is_online ? 'Yes' : 'No' }}"
                                       data-score="{{ number_format($driver->score ?? 0, 2) }}">

                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $driver->user?->name ?? '—' }}</h6>
                                            <small>
                                                <span class="badge bg-{{ $driver->status == 'available' ? 'success' : 'warning' }}">
                                                    {{ ucfirst($driver->status) }}
                                                </span>
                                            </small>
                                        </div>
                                        <p class="mb-1 small">
                                            Online: {{ $driver->is_online ? 'Yes' : 'No' }} • Score: {{ number_format($driver->score ?? 0, 2) }}
                                        </p>
                                        <small class="text-muted">
                                            @if($driver->trips->isNotEmpty())
                                                Current Trip #{{ $driver->trips->first()->id }}
                                            @else
                                                Idle
                                            @endif
                                        </small>
                                    </a>
                                @endif
                            @empty
                                <p class="text-center text-muted py-4">No drivers with location data.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    let map;
    let markers = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById("fleetMap"), {
            center: { lat: 22.7196, lng: 75.8577 }, // Indore center as default
            zoom: 11,
            mapTypeId: 'roadmap',
            fullscreenControl: true,
            streetViewControl: false
        });

        // Add markers for each driver
        @foreach($drivers as $driver)
            @if($driver->current_lat && $driver->current_long)
                const marker = new google.maps.Marker({
                    position: { lat: {{ $driver->current_lat }}, lng: {{ $driver->current_long }} },
                    map: map,
                    title: "{{ $driver->user?->name ?? 'Driver' }}",
                    icon: {
                        url: "{{ $driver->is_online ? asset('assets/images/marker-online.png') : asset('assets/images/marker-offline.png') }}",
                        scaledSize: new google.maps.Size(40, 40)
                    }
                });

                const infoWindow = new google.maps.InfoWindow({
                    content: `
                        <div style="min-width: 200px;">
                            <h6>${{ $driver->user?->name ?? 'Unknown' }}</h6>
                            <p>Status: <strong>{{ ucfirst($driver->status) }}</strong></p>
                            <p>Online: {{ $driver->is_online ? 'Yes' : 'No' }}</p>
                            <p>Score: {{ number_format($driver->score ?? 0, 2) }}</p>
                            <p>Utilization: {{ number_format($driver->utilization_rate ?? 0, 1) }}%</p>
                        </div>
                    `
                });

                marker.addListener("click", () => {
                    infoWindow.open(map, marker);
                });

                markers.push(marker);
            @endif
        @endforeach

        // Click on driver list → center map + open info window
        document.querySelectorAll('.driver-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const lat = parseFloat(this.dataset.lat);
                const lng = parseFloat(this.dataset.lng);

                if (!isNaN(lat) && !isNaN(lng)) {
                    map.setCenter({ lat, lng });
                    map.setZoom(15);

                    // Find corresponding marker and simulate click
                    const marker = markers.find(m =>
                        m.getPosition().lat() === lat && m.getPosition().lng() === lng
                    );
                    if (marker) google.maps.event.trigger(marker, 'click');
                }
            });
        });
    }
</script>
@endpush
@endsection
