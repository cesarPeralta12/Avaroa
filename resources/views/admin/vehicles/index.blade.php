@extends('layout.master')

@section('title', 'Vehicles Management')

@section('main_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Vehicles List</h4>
                    <a href="{{ route('vehicles.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add
                        Vehicle</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Plate</th>
                                    <th>Type</th>
                                    <th>Driver</th>
                                    <th>Weight Cap (kg)</th>
                                    <th>Volume Cap (m³)</th>
                                    <th>Expires</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td><strong>{{ $vehicle->plate_number }}</strong></td>
                                        <td>{{ ucfirst($vehicle->type) }}</td>
                                        <td>{{ $vehicle->driver?->user?->name ?? '—' }}</td>
                                        <td>{{ number_format($vehicle->capacity_weight ?? 0) }}</td>
                                        <td>{{ number_format($vehicle->capacity_volume ?? 0, 2) }}</td>
                                        <td>{{ old('expiration_date', \Carbon\Carbon::parse($vehicle->expiration_date)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <!-- delete button similar to drivers -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">No vehicles found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
