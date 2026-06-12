@extends('layout.master')

@section('title', 'Pricing Rules')

@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Pricing Rules</h4>
                <a href="{{ route('pricing-rules.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> New Rule</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Active</th>
                                <th>Conditions (JSON)</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rules as $rule)
                            <tr>
                                <td>{{ $rule->id }}</td>
                                <td>{{ $rule->type }}</td>
                                <td>{{ $rule->value }}</td>
                                <td>
                                    <span class="badge bg-{{ $rule->active ? 'success' : 'danger' }}">
                                        {{ $rule->active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <pre class="mb-0 small">{{ json_encode(json_decode($rule->conditions ?? '{}'), JSON_PRETTY_PRINT) }}</pre>
                                </td>
                                <td>{{ $rule->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('pricing-rules.edit', $rule) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center py-4">No pricing rules defined yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
