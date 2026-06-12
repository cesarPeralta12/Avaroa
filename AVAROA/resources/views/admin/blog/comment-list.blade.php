@extends('layout.master')

@section('title')
{{ $title }}
@endsection

@section('main_content')
    <!-- Page content area start -->

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('Comentario de Blog') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin.dashboard') }}">{{ __('Panel') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Comentario de Blog') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 " >
                            <div class="card-header  d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">{{ __('Lista de Comentarios de Blog') }}</h4>
                                <button type="button" class="btn btn-danger" id="bulk-delete-button">Delete Selected</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-1" class="table table-bordered table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <input type="checkbox" id="select-all" class="mr-2">&nbsp;
                                                        <label for="select-all" class="mb-0 text-dark">Select All</label>
                                                    </div>
                                                </th>

                                                <th>{{ __('Blog') }}</th>
                                                <th>{{ __('Usuario') }}</th>
                                                <th>{{ __('Comentario') }}</th>
                                                <th>{{ __('Estado') }}</th>
                                                <th>{{ __('Acción') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comments as $comment)
                                                <tr class="removable-item">
                                                    <td class="text-center">
                                                        <input type="checkbox" class="select-item" name="selected_ids[]" value="{{ $comment->id }}">
                                                    </td>
                                                    <td>{{ @$comment->blog->title }}</td>
                                                    <td class="d-flex align-items-center">
                                                        <img src="{{ asset(@$comment->user->image_path) }}" class="rounded-circle mr-2" width="40" height="40" alt="User Image">
                                                        <span>{{ @$comment->user->name }}</span>
                                                    </td>
                                                    <td>{{ $comment->comment }}</td>
                                                    <td>
                                                        <select name="status" class="status form-control form-control-sm badge badge-info" data-id="{{ $comment->id }}">
                                                            <option value="1" @if($comment->status == 1) selected @endif>{{ __('Activo') }}</option>
                                                            <option value="0" @if($comment->status != 1) selected @endif>{{ __('Desactivado') }}</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="javascript:void(0);" data-url="{{ route('blog.blogComment.delete', [$comment->id]) }}" title="Delete" class="btn-action delete text-danger">
                                                                <i class="fa fa-trash-alt"></i>
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

    <!-- Page content area end -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
    <script>
        'use strict';

        // Function to handle the select all checkbox
        function handleSelectAll() {
            document.getElementById('select-all').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.select-item');
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            });
        }

        // Function to handle bulk delete
        function handleBulkDelete() {
            document.getElementById('bulk-delete-button').addEventListener('click', function() {
                const selectedIds = Array.from(document.querySelectorAll('.select-item:checked'))
                    .map(checkbox => checkbox.value);

                if (selectedIds.length === 0) {
                    alert('Please select at least one comment to delete.');
                    return;
                }

                Swal.fire({
                    title: "{{ __('Are you sure you want to delete selected comments?') }}",
                    text: "{{ __('This action cannot be undone!') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{ __('Yes, delete them!') }}",
                    cancelButtonText: "{{ __('No, cancel!') }}",
                    reverseButtons: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('blog.blogComment.bulkDelete') }}",
                            data: {
                                selected_ids: selectedIds,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                toastr.success("{{ __('Selected comments have been deleted') }}");
                                selectedIds.forEach(id => {
                                    $(`.removable-item input[value="${id}"]`).closest('tr').remove();
                                });
                            },
                            error: function (xhr) {
                                toastr.error("{{ __('Error deleting selected comments') }}");
                            }
                        });
                    }
                });
            });
        }

        // Function to handle status change
        function handleStatusChange() {
            $('.status').change(function() {
                const commentId = $(this).data('id');
                const statusValue = $(this).val();

                Swal.fire({
                    title: "{{ __('Are you sure to change status?') }}",
                    text: "{{ __('This action cannot be undone!') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{ __('Yes, change it!') }}",
                    cancelButtonText: "{{ __('No, cancel!') }}",
                    reverseButtons: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('blog.changeBlogCommentStatus') }}",
                            data: {
                                id: commentId,
                                status: statusValue,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                toastr.success("{{ __('Comment status updated successfully') }}");
                            },
                            error: function () {
                                toastr.error("{{ __('Error updating comment status') }}");
                            }
                        });
                    }
                });
            });
        }

        // Initialize functions
        document.addEventListener('DOMContentLoaded', function () {
            handleSelectAll();
            handleBulkDelete();
            handleStatusChange();
        });
    </script>
@endsection
