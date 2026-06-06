@extends('layout.master')

@section('title')
    {{ __('Portfolio Management') }}
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
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ __('Portfolio List') }}</h2>
                            <a href="{{ route('portfolios.create') }}" class="btn btn-success btn-sm pull-right">
                                <i class="fa fa-plus"></i> {{ __('Add Portfolio') }}
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
                                            <th>{{ __('Project Name') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($portfolios as $portfolio)
                                        <tr class="removable-item">
                                            <td><input type="checkbox" class="portfolio-checkbox" value="{{ $portfolio->id }}"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $portfolio->title }}</td>
                                            <td>{{ Str::limit($portfolio->description, 50) }}</td>
                                            <td>
                                                <div class="action__buttons">
                                                    <a href="{{ route('portfolios.edit', [$portfolio->id]) }}"
                                                        title="{{ __('Edit') }}"
                                                        class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                        data-toggle="tooltip">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" title="{{ __('Delete') }}"
                                                        class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-portfolio"
                                                        data-toggle="tooltip"
                                                        data-url="{{ route('portfolios.delete', $portfolio->id) }}">
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
            $('.portfolio-checkbox').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Enable/disable bulk delete button based on selected checkboxes
        $('.portfolio-checkbox').change(function() {
            toggleBulkDeleteButton();
        });

        // Function to toggle the bulk delete button
        function toggleBulkDeleteButton() {
            $('#bulk-delete').prop('disabled', $('.portfolio-checkbox:checked').length === 0);
        }

        // Bulk delete action
        $('#bulk-delete').click(function() {
            const selectedIds = $('.portfolio-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length > 0) {
                Swal.fire({
                    title: '{{ __("Are you sure?") }}',
                    text: "{{ __('This action will permanently delete the selected items.') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: '{{ __("Yes, delete") }}',
                    cancelButtonText: '{{ __("Cancel") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('portfolios.bulk.delete') }}",
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    location.reload(); // Reload the page to reflect the changes
                                }
                            },
                            error: function(xhr) {
                                location.reload(); // Reload the page even if there's an error
                            }
                        });
                    }
                });
            }
        });

        // Individual delete confirmation with SweetAlert
        $('.delete-portfolio').click(function(e) {
            e.preventDefault();

            let deleteUrl = $(this).data('url');

            Swal.fire({
                title: '{{ __("Are you sure?") }}',
                text: "{{ __('This action will permanently delete this portfolio.') }}",
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
                                location.reload(); // Reload the page after successful deletion
                            }
                        },
                        error: function(xhr) {
                            location.reload(); // Reload the page if there's an error
                        }
                    });
                }
            });
        });
    });
</script>



@endsection
