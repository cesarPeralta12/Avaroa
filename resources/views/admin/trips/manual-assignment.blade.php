@extends('layout.master')

@section('title', 'Manual Trip Assignment')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <!-- Map Column -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Assignment Map</h4>
                        <small class="text-muted">Pending trips (orange) • Available drivers (green)</small>
                    </div>
                    <div class="card-body p-0">
                        <div id="assignmentMap" style="height: 600px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <!-- Pending Trips + Drivers List -->
            <div class="col-xl-4">
                <!-- Pending Trips -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pending Trips ({{ $pendingTrips->count() }})</h5>
                    </div>
                    <div class="card-body" style="max-height: 280px; overflow-y: auto;">
                        <div class="list-group">
                            @forelse($pendingTrips as $trip)
                                <a href="#" class="list-group-item list-group-item-action trip-item"
                                   data-lat="{{ $trip->origin_lat ?? '' }}"
                                   data-lng="{{ $trip->origin_lng ?? '' }}"
                                   data-id="{{ $trip->id }}"
                                   data-customer="{{ $trip->customer?->name ?? '—' }}"
                                   data-service="{{ $trip->service_type }}">

                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Trip #{{ $trip->id }}</h6>
                                        <span class="badge bg-warning">{{ $trip->status }}</span>
                                    </div>
                                    <p class="mb-1 small">{{ $trip->customer?->name ?? '—' }} • {{ $trip->service_type }}</p>
                                    <small class="text-muted">
                                        {{ Str::limit($trip->origin_url ?? '—', 40) }}
                                    </small>
                                </a>
                            @empty
                                <p class="text-center text-muted py-3">No pending trips</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Available Drivers -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Available Drivers ({{ $availableDrivers->count() }})</h5>
                    </div>
                    <div class="card-body" style="max-height: 280px; overflow-y: auto;">
                        <div class="list-group">
                            @forelse($availableDrivers as $driver)
                                <a href="#" class="list-group-item list-group-item-action driver-item"
                                   data-lat="{{ $driver->current_lat ?? '' }}"
                                   data-lng="{{ $driver->current_long ?? '' }}"
                                   data-id="{{ $driver->id }}"
                                   data-name="{{ $driver->user?->name ?? '—' }}"
                                   data-score="{{ number_format($driver->score ?? 0, 2) }}">

                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $driver->user?->name ?? '—' }}</h6>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                    <p class="mb-1 small">Score: {{ number_format($driver->score ?? 0, 2) }}</p>
                                    <small class="text-muted">
                                        @if($driver->current_lat && $driver->current_long)
                                            {{ number_format($driver->current_lat, 5) }}, {{ number_format($driver->current_long, 5) }}
                                        @else
                                            No location
                                        @endif
                                    </small>
                                </a>
                            @empty
                                <p class="text-center text-muted py-3">No available drivers</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Keep your existing Assign Modal here (unchanged) -->

@push('maps-script')
@if(config('services.google.maps_key'))
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap&libraries=places,marker&v=weekly">
</script>
@endif
@endpush

@push('scripts')
<script>
    let map;
    let tripMarkers = [];
    let driverMarkers = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById("assignmentMap"), {
            center: { lat: 22.7196, lng: 75.8577 }, // Indore default
            zoom: 11,
            mapTypeId: 'roadmap'
        });

        // Pending Trips Markers (orange)
        @foreach($pendingTrips as $trip)
            @if($trip->origin_lat && $trip->origin_lng)
                const tripMarker = new google.maps.Marker({
                    position: { lat: {{ $trip->origin_lat }}, lng: {{ $trip->origin_lng }} },
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/orange-dot.png",
                    title: "Trip #{{ $trip->id }}"
                });

                const tripInfo = new google.maps.InfoWindow({
                    content: `
                        <div>
                            <h6>Trip #{{ $trip->id }}</h6>
                            <p>Customer: {{ $trip->customer?->name ?? '—' }}</p>
                            <p>Service: {{ $trip->service_type }}</p>
                            <p>From: {{ Str::limit($trip->origin_url ?? '—', 60) }}</p>
                        </div>
                    `
                });

                tripMarker.addListener("click", () => tripInfo.open(map, tripMarker));
                tripMarkers.push(tripMarker);
            @endif
        @endforeach

        // Available Drivers Markers (green)
        @foreach($availableDrivers as $driver)
            @if($driver->current_lat && $driver->current_long)
                const driverMarker = new google.maps.Marker({
                    position: { lat: {{ $driver->current_lat }}, lng: {{ $driver->current_long }} },
                    map: map,
                    icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                    title: "{{ $driver->user?->name ?? 'Driver' }}"
                });

                const driverInfo = new google.maps.InfoWindow({
                    content: `
                        <div>
                            <h6>{{ $driver->user?->name ?? 'Driver' }}</h6>
                            <p>Score: {{ number_format($driver->score ?? 0, 2) }}</p>
                            <p>Acceptance: {{ number_format($driver->acceptance_rate ?? 0, 1) }}%</p>
                        </div>
                    `
                });

                driverMarker.addListener("click", () => driverInfo.open(map, driverMarker));
                driverMarkers.push(driverMarker);
            @endif
        @endforeach

        // Click on trip list → center map
        document.querySelectorAll('.trip-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const lat = parseFloat(this.dataset.lat);
                const lng = parseFloat(this.dataset.lng);
                if (!isNaN(lat) && !isNaN(lng)) {
                    map.setCenter({ lat, lng });
                    map.setZoom(14);
                }
            });
        });

        // Click on driver list → center map
        document.querySelectorAll('.driver-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const lat = parseFloat(this.dataset.lat);
                const lng = parseFloat(this.dataset.lng);
                if (!isNaN(lat) && !isNaN(lng)) {
                    map.setCenter({ lat, lng });
                    map.setZoom(14);
                }
            });
        });
    }
</script>
@endpush
@endsection
