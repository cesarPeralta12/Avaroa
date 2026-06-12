@extends('layout.master')

@section('title')
    {{ __('Testimonial Management') }}
@endsection

@section('main_content')

    <div class="page-content">
        <div class="container-fluid">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                <p>{{ session('fail') }}</p>
            </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-header">
                            <h2>{{ __('Testimonial List') }}</h2>
                            <a href="{{ route('testimonials.create') }}" class="btn btn-success btn-sm pull-right">
                                <i class="fa fa-plus"></i> {{ __('Add Testimonial') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                <i class="fas fa-trash-alt"></i> {{ __('Delete Selected') }}
                            </button>
                            <div class="table-responsive">
                                <table id="basic-1" class="row-border data-table-filter table-style">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Role') }}</th>
                                            <th>{{ __('Feedback') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                        <tr class="removable-item">
                                            <td><input type="checkbox" class="testimonial-checkbox" value="{{ $testimonial->id }}"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $testimonial->client_name }}</td>
                                            <td>{{ $testimonial->client_role }}</td>
                                            <td>{{ Str::limit($testimonial->content, 50) }}</td>
                                            <td>
                                                <div class="action__buttons">
                                                    <a href="{{ route('testimonials.edit', [$testimonial->id]) }}"
                                                        title="{{ __('Edit') }}"
                                                        class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                        data-toggle="tooltip">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" title="{{ __('Delete') }}"
                                                        class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-testimonial"
                                                        data-toggle="tooltip"
                                                        data-url="{{ route('testimonials.delete', $testimonial->id) }}">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Select all checkboxes
        $('#select-all').click(function() {
            $('.testimonial-checkbox').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Enable/disable bulk delete button based on selected checkboxes
        $('.testimonial-checkbox').change(function() {
            toggleBulkDeleteButton();
        });

        // Function to toggle the bulk delete button
        function toggleBulkDeleteButton() {
            $('#bulk-delete').prop('disabled', $('.testimonial-checkbox:checked').length === 0);
        }

        // Bulk delete action
        $('#bulk-delete').click(function() {
            const selectedIds = $('.testimonial-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length > 0) {
                Swal.fire({
                    title: '{{ __("Are you sure?") }}',
                    text: "{{ __('This action will permanently delete the selected testimonials.') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: '{{ __("Yes, delete") }}',
                    cancelButtonText: '{{ __("Cancel") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('testimonials.bulk.delete') }}",
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Reload the page after successful bulk delete
                                    location.reload();
                                } else {
                                    // Reload the page after failed bulk delete
                                    location.reload();
                                }
                            },
                            error: function(xhr) {
                                // Reload the page if there's an error
                                location.reload();
                            }
                        });
                    }
                });
            }
        });

        // Individual delete confirmation with SweetAlert
        $('.delete-testimonial').click(function(e) {
            e.preventDefault();

            let deleteUrl = $(this).data('url');

            Swal.fire({
                title: '{{ __("Are you sure?") }}',
                text: "{{ __('This action will permanently delete this testimonial.') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#007bff',
                confirmButtonText: '{{ __("Yes, delete") }}',
                cancelButtonText: '{{ __("Cancel") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: deleteUrl,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                // Reload the page after successful delete
                                location.reload();
                            } else {
                                // Reload the page after failed delete
                                location.reload();
                            }
                        },
                        error: function(xhr) {
                            // Reload the page if there's an error
                            location.reload();
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
