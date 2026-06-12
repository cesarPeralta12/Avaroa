@extends('layout.master')

@section('title', 'Audit Logs')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Audit Logs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Event</th>
                                <th>Trip / Conv</th>
                                <th>Details</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->user?->name ?? 'System' }} (ID: {{ $log->user_id ?? '—' }})</td>
                                <td><code>{{ $log->event_type }}</code></td>
                                <td>
                                    @if($log->trip_id) Trip #{{ $log->trip_id }} @endif
                                    @if($log->conversation_id) Conv #{{ $log->conversation_id }} @endif
                                </td>
                                <td>
                                    <pre class="mb-0 small bg-light p-2 rounded">{{ json_encode(json_decode($log->details ?? '{}'), JSON_PRETTY_PRINT) }}</pre>
                                </td>
                                <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="text-center py-4">No audit entries yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
