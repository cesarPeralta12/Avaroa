@extends('layout.master')

@section('title', 'Edit Trip #' . $trip->id)

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0"><i class="fas fa-edit"></i> Edit Trip #{{ $trip->id }}</h4>
                <a href="{{ route('trips.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body">
                <!-- Show current status -->
                <div class="alert alert-info mb-4">
                    <strong>Current Status:</strong>
                    @php
                        $color = match($trip->status) {
                            'NEW', 'searching' => 'warning',
                            'ASSIGNED', 'DISPATCHING' => 'info',
                            'PICKUP', 'IN_TRIP' => 'primary',
                            'COMPLETED' => 'success',
                            'CANCELLED', 'FAILED' => 'danger',
                            default => 'secondary',
                        };
                    @endphp
                    <span class="badge bg-{{ $color }} ms-2">{{ $trip->status }}</span>
                </div>

                <form action="{{ route('trips.update', $trip) }}" method="POST" class="ajax-form" id="tripEditForm">
                    @csrf
                    @method('PUT')

                    <!-- Customer & Service Type -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Customer</label>
                            <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
                                <option value="">— Select customer —</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $trip->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name ?? $customer->email }} (ID: {{ $customer->id }})
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Service Type</label>
                            <select name="service_type" id="service_type" class="form-select @error('service_type') is-invalid @enderror" required>
                                <option value="Taxi"      {{ old('service_type', $trip->service_type) == 'Taxi'      ? 'selected' : '' }}>Taxi</option>
                                <option value="Delivery"  {{ old('service_type', $trip->service_type) == 'Delivery'  ? 'selected' : '' }}>Delivery</option>
                                <option value="Cargo"     {{ old('service_type', $trip->service_type) == 'Cargo'     ? 'selected' : '' }}>Cargo</option>
                            </select>
                            @error('service_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Origin -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Origin Address / URL</label>
                            <input type="text" name="origin_url" id="origin_url" class="form-control"
                                   value="{{ old('origin_url', $trip->origin_url) }}" placeholder="e.g. https://maps.app.goo.gl/...">
                            <small class="form-text text-muted">Google Maps link or place name</small>
                            @error('origin_url') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Origin Coordinates</label>
                            <div class="input-group">
                                <input type="number" step="any" name="origin_lat" id="origin_lat" class="form-control @error('origin_lat') is-invalid @enderror"
                                       value="{{ old('origin_lat', $trip->origin_lat) }}" placeholder="Latitude" required>
                                <input type="number" step="any" name="origin_lng" id="origin_lng" class="form-control @error('origin_lng') is-invalid @enderror"
                                       value="{{ old('origin_lng', $trip->origin_lng) }}" placeholder="Longitude" required>
                            </div>
                            @error('origin_lat') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            @error('origin_lng') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Destination -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Destination Address / URL</label>
                            <input type="text" name="destination_url" id="destination_url" class="form-control"
                                   value="{{ old('destination_url', $trip->destination_url) }}" placeholder="e.g. https://maps.app.goo.gl/...">
                            <small class="form-text text-muted">Google Maps link or place name</small>
                            @error('destination_url') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label required">Destination Coordinates</label>
                            <div class="input-group">
                                <input type="number" step="any" name="destination_lat" id="destination_lat" class="form-control @error('destination_lat') is-invalid @enderror"
                                       value="{{ old('destination_lat', $trip->destination_lat) }}" placeholder="Latitude" required>
                                <input type="number" step="any" name="destination_lng" id="destination_lng" class="form-control @error('destination_lng') is-invalid @enderror"
                                       value="{{ old('destination_lng', $trip->destination_lng) }}" placeholder="Longitude" required>
                            </div>
                            @error('destination_lat') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            @error('destination_lng') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="mb-4">
                        <label class="form-label">Adjust locations on map (drag markers)</label>
                        <div id="tripMap" style="height: 400px; border: 1px solid #ced4da; border-radius: 6px;"></div>
                    </div>

                    <!-- Payment & Extras -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Payment Method</label>
                            <select name="payment_method" class="form-select @error('payment_method') is-invalid @enderror" required>
                                <option value="cash"          {{ old('payment_method', $trip->payment_method) == 'cash'          ? 'selected' : '' }}>Cash</option>
                                <option value="qr"            {{ old('payment_method', $trip->payment_method) == 'qr'            ? 'selected' : '' }}>QR</option>
                                <option value="card"          {{ old('payment_method', $trip->payment_method) == 'card'          ? 'selected' : '' }}>Card</option>
                                <option value="bank_transfer" {{ old('payment_method', $trip->payment_method) == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            </select>
                            @error('payment_method') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3" id="passengersGroup" style="display: none;">
                            <label class="form-label">Number of Passengers</label>
                            <input type="number" name="num_passengers" min="1" max="10" class="form-control"
                                   value="{{ old('num_passengers', $trip->num_passengers ?? 1) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Trunk Required?</label>
                            <div class="form-check form-switch mt-2">
                                <input name="trunk_required" type="checkbox" class="form-check-input" {{ old('trunk_required', $trip->trunk_required) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <!-- Cargo -->
                    <div class="row" id="cargoGroup" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo Type</label>
                            <input type="text" name="cargo_type" class="form-control" value="{{ old('cargo_type', $trip->cargo_type) }}"
                                   placeholder="e.g. Electronics, Furniture">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Weight (kg)</label>
                            <input type="number" step="0.1" name="weight" class="form-control" value="{{ old('weight', $trip->weight) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Volume (m³)</label>
                            <input type="number" step="0.01" name="volume" class="form-control" value="{{ old('volume', $trip->volume) }}">
                        </div>
                    </div>

                    <!-- Scheduling & Notes -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Scheduled Time (optional)</label>
                            <input type="datetime-local" name="scheduled_time" class="form-control"
                                   value="{{ old('scheduled_time', $trip->scheduled_time?->format('Y-m-d\TH:i') ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Notes / Special Instructions</label>
                            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $trip->notes) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary px-5 py-2">
                            <i class="fas fa-save me-2"></i> Update Trip
                        </button>
                        <a href="{{ route('trips.index') }}" class="btn btn-outline-secondary px-4 py-2 ms-3">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('maps-script')
@if(config('services.google.maps_key'))
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&callback=initMap&libraries=places,marker&v=weekly">
</script>
@endif
@endpush

@push('scripts')
<script>
// Conditional visibility
document.getElementById('service_type').addEventListener('change', function() {
    const type = this.value;
    document.getElementById('passengersGroup').style.display = (type === 'Taxi') ? 'block' : 'none';
    document.getElementById('cargoGroup').style.display = (type === 'Cargo' || type === 'Delivery') ? 'block' : 'none';
});

// Google Maps – pre-filled markers
let map, originMarker, destMarker;

function initMap() {
    const originLat = parseFloat(document.getElementById('origin_lat').value) || 22.7196;
    const originLng = parseFloat(document.getElementById('origin_lng').value) || 75.8577;

    map = new google.maps.Map(document.getElementById('tripMap'), {
        center: { lat: originLat, lng: originLng },
        zoom: 12,
        mapTypeId: 'roadmap'
    });

    // Origin marker if coordinates exist
    if (originLat && originLng && !isNaN(originLat) && !isNaN(originLng)) {
        originMarker = new google.maps.Marker({
            position: { lat: originLat, lng: originLng },
            map: map,
            draggable: true
        });

        google.maps.event.addListener(originMarker, 'dragend', e => {
            document.getElementById('origin_lat').value = e.latLng.lat().toFixed(6);
            document.getElementById('origin_lng').value = e.latLng.lng().toFixed(6);
        });
    }

    // Destination marker
    const destLat = parseFloat(document.getElementById('destination_lat').value);
    const destLng = parseFloat(document.getElementById('destination_lng').value);
    if (destLat && destLng && !isNaN(destLat) && !isNaN(destLng)) {
        destMarker = new google.maps.Marker({
            position: { lat: destLat, lng: destLng },
            map: map,
            draggable: true,
            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
        });

        google.maps.event.addListener(destMarker, 'dragend', e => {
            document.getElementById('destination_lat').value = e.latLng.lat().toFixed(6);
            document.getElementById('destination_lng').value = e.latLng.lng().toFixed(6);
        });
    }

    // Autocomplete origin
    const originAutocomplete = new google.maps.places.Autocomplete(document.getElementById('origin_url'));
    originAutocomplete.bindTo('bounds', map);
    originAutocomplete.addListener('place_changed', () => {
        const place = originAutocomplete.getPlace();
        if (!place.geometry) return;

        map.setCenter(place.geometry.location);
        map.setZoom(15);

        if (originMarker) originMarker.setMap(null);
        originMarker = new google.maps.Marker({ map, position: place.geometry.location, draggable: true });

        document.getElementById('origin_lat').value = place.geometry.location.lat().toFixed(6);
        document.getElementById('origin_lng').value = place.geometry.location.lng().toFixed(6);

        if (place.formatted_address) document.getElementById('origin_url').value = place.formatted_address;
    });

    // Autocomplete destination
    const destAutocomplete = new google.maps.places.Autocomplete(document.getElementById('destination_url'));
    destAutocomplete.bindTo('bounds', map);
    destAutocomplete.addListener('place_changed', () => {
        const place = destAutocomplete.getPlace();
        if (!place.geometry) return;

        if (destMarker) destMarker.setMap(null);
        destMarker = new google.maps.Marker({
            map,
            position: place.geometry.location,
            draggable: true,
            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
        });

        document.getElementById('destination_lat').value = place.geometry.location.lat().toFixed(6);
        document.getElementById('destination_lng').value = place.geometry.location.lng().toFixed(6);

        if (place.formatted_address) document.getElementById('destination_url').value = place.formatted_address;
    });

    // Map click fallback
    map.addListener('click', e => {
        if (!originMarker) {
            originMarker = new google.maps.Marker({ position: e.latLng, map, draggable: true });
            document.getElementById('origin_lat').value = e.latLng.lat().toFixed(6);
            document.getElementById('origin_lng').value = e.latLng.lng().toFixed(6);
        }
    });
}

// Trigger visibility on load
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('service_type').dispatchEvent(new Event('change'));
});
</script>
@endpush
