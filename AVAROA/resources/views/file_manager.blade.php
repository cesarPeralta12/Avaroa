@extends('layout.master')

@section('title')
{{ __('File Manager') }}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>File Manager</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Apps</li>
                    <li class="breadcrumb-item active">File Manager</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 box-col-30">
            <div class="md-sidebar job-sidebar">
                <a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">file filter</a>
                <div class="md-sidebar-aside custom-scrollbar">
                    <div class="file-sidebar">
                        <div class="card">
                            <div class="card-body">
                                <ul>
                                    <li>
                                        <a class="btn btn-primary"><i data-feather="home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-light"><i data-feather="folder"></i>All</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-light"><i data-feather="clock"></i>Recent</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-light"><i data-feather="trash-2"></i>Deleted</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul>
                                    <li>
                                        <div class="btn btn-outline-primary"><i data-feather="database"></i>Storage
                                        </div>
                                        <div class="m-t-15">
                                            <div class="progress sm-progress-bar mb-3">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <h6 class="f-w-500">25 GB of 100 GB used</h6>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-md-12 box-col-70">
            <div class="file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="d-md-flex d-sm-block">

                            <div class="flex-grow-1 text-end">

                                <!-- Trigger for file upload modal -->
                                <div class="btn btn-primary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#uploadFileModal">
                                    <i data-feather="upload"></i> Upload File
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body file-manager">
                        <h5>Quick Access</h5>
                        <ul class="quick-file d-flex flex-row">
                            <li>
                                <div class="quick-box"><i class="fa fa-youtube-play font-danger"></i></div>
                                <h6>Videos</h6>
                            </li>
                            <li>
                                <div class="quick-box"><i class="fa fa-file-text-o font-secondary"></i></div>
                                <h6>Documents</h6>
                            </li>
                            <li>
                                <div class="quick-box"><i class="fa fa-music font-warning"></i></div>
                                <h6>Music</h6>
                            </li>
                            <li>
                                <div class="quick-box"><i class="fa fa-file-archive-o font-secondary"></i></div>
                                <h6>Zip Files</h6>
                            </li>
                            <li>
                                <div class="quick-box"><i class="fa fa-trash font-danger"></i></div>
                                <h6>Trash</h6>
                            </li>
                        </ul>


                        <!-- View Mode Toggle -->
                        <div class="view-toggle mb-3">
                            <button id="grid-view-btn" class="btn btn-light active"><i class="fa fa-th-large"></i> Grid
                                View</button>
                            <button id="list-view-btn" class="btn btn-light"><i class="fa fa-list"></i> List
                                View</button>
                        </div>

                        <h5 class="mt-4">Files</h5>
                        <!-- Grid/List View for Files -->
                        <ul class="d-flex flex-wrap files-content list-view">
                            @foreach ($files as $file)
                                <li class="folder-box file-item d-flex align-items-center">
                                    <a href="{{ asset('uploads/video/' . $file->name) }}" target="_blank" class="file-link">
                                        <div class="d-flex align-items-center files-list">
                                            <div class="flex-shrink-0 file-left">
                                                <!-- Conditional file extension icons -->
                                                @if(in_array($file->extension, ['mp4', 'mkv', 'avi', 'mov']))
                                                    <i class="fa fa-play-circle font-primary"></i> <!-- Video file icon -->
                                                @elseif(in_array($file->extension, ['mp3', 'wav', 'aac']))
                                                    <i class="icofont icofont-file-mp3 font-warning"></i>
                                                    <!-- Audio file icon -->
                                                @elseif(in_array($file->extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                                                    <i class="icofont icofont-file-image font-success"></i>
                                                    <!-- Image file icon -->
                                                @elseif(in_array($file->extension, ['pdf']))
                                                    <i class="icofont icofont-file-pdf font-danger"></i> <!-- PDF file icon -->
                                                @elseif(in_array($file->extension, ['doc', 'docx', 'txt']))
                                                    <i class="icofont icofont-file-text font-secondary"></i>
                                                    <!-- Document file icon -->
                                                @elseif(in_array($file->extension, ['zip', 'rar', 'tar', '7z']))
                                                    <i class="icofont icofont-file-archive font-info"></i>
                                                    <!-- Zip/Archive file icon -->
                                                @elseif(in_array($file->extension, ['html', 'css', 'js', 'php', 'xml']))
                                                    <i class="icofont icofont-file-code font-dark"></i> <!-- Code file icon -->
                                                @else
                                                    <i class="icofont icofont-file font-muted"></i> <!-- Default file icon -->
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6>{{ $file->name }}</h6>
                                                <p>{{ $file->updated_at->diffForHumans() }}, {{ $file->size }} MB</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="d-flex flex-wrap files-content grid-view d-none">
                            @foreach ($files as $file)
                                <li class="folder-box file-item">
                                    <a href="{{ asset('uploads/video/' . $file->name) }}" target="_blank" class="file-link">
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Conditional file extension icons for grid view -->
                                            @if(in_array($file->extension, ['mp4', 'mkv', 'avi', 'mov']))
                                                <i class="fa fa-play-circle font-primary"></i> <!-- Video file icon -->
                                            @elseif(in_array($file->extension, ['mp3', 'wav', 'aac']))
                                                <i class="icofont icofont-file-mp3 font-warning"></i> <!-- Audio file icon -->
                                            @elseif(in_array($file->extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                                                <i class="icofont icofont-file-image font-success"></i> <!-- Image file icon -->
                                            @elseif(in_array($file->extension, ['pdf']))
                                                <i class="icofont icofont-file-pdf font-danger"></i> <!-- PDF file icon -->
                                            @elseif(in_array($file->extension, ['doc', 'docx', 'txt']))
                                                <i class="icofont icofont-file-text font-secondary"></i>
                                                <!-- Document file icon -->
                                            @elseif(in_array($file->extension, ['zip', 'rar', 'tar', '7z']))
                                                <i class="icofont icofont-file-archive font-info"></i>
                                                <!-- Zip/Archive file icon -->
                                            @elseif(in_array($file->extension, ['html', 'css', 'js', 'php', 'xml']))
                                                <i class="icofont icofont-file-code font-dark"></i> <!-- Code file icon -->
                                            @else
                                                <i class="icofont icofont-file font-muted"></i> <!-- Default file icon -->
                                            @endif
                                            <h6>{{ $file->name }}</h6>
                                            <p>{{ $file->updated_at->diffForHumans() }}, {{ $file->size }} MB</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>


                    </div>

                    <style>
                        /* Common Styles for both views */
                        /* General Styles */
                        .files-content,
                        .folder {
                            padding: 0;
                            margin: 0;
                            list-style-type: none;
                        }

                        /* Folder Box */
                        .folder-box {
                            margin: 15px;
                            text-align: center;
                            width: calc(25% - 30px);
                            /* Adjust for responsiveness */
                        }

                        .folder-box i {
                            font-size: 36px;
                        }

                        /* Grid View Files */
                        .grid-view .file-item {
                            width: calc(25% - 30px);
                            /* Adjust for responsiveness */
                            text-align: center;
                            margin: 10px;
                            padding: 10px;
                            border: 1px solid #ddd;
                            border-radius: 5px;
                        }

                        .grid-view .file-item i {
                            font-size: 40px;
                            margin-bottom: 10px;
                        }

                        .grid-view .file-item h6 {
                            font-size: 14px;
                            margin-bottom: 5px;
                        }

                        .grid-view .file-item p {
                            font-size: 12px;
                            color: #666;
                        }

                        /* List View Files */
                        .list-view .file-item {
                            width: 100%;
                            padding: 10px 0;
                            border-bottom: 1px solid #ddd;
                            display: flex;
                            align-items: center;
                        }

                        .list-view .file-item i {
                            font-size: 30px;
                            margin-right: 20px;
                        }

                        .list-view .file-item h6 {
                            font-size: 16px;
                        }

                        .list-view .file-item p {
                            font-size: 14px;
                            color: #666;
                        }

                        /* View Mode Toggle */
                        .view-toggle {
                            margin-bottom: 20px;
                        }

                        .view-toggle .btn {
                            margin-right: 10px;
                        }

                        /* Responsive Styles */
                        @media (max-width: 768px) {

                            .folder-box,
                            .grid-view .file-item {
                                width: calc(50% - 30px);
                                /* Adjust for medium screens */
                            }
                        }

                        @media (max-width: 480px) {

                            .folder-box,
                            .grid-view .file-item {
                                width: 100%;
                                /* Full-width on smaller screens */
                            }
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileModalLabel">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- File Upload Form -->
                <form action="{{ route('upload.file', ['folderId' => 1]) }}" method="POST" class="dropzone"
                    id="singleFileUpload">
                    @csrf
                    <div class="dz-message needsclick">
                        <i class="icon-cloud-up"></i>
                        <h6>Drop files here or click to upload.</h6>
                        <span class="note needsclick">(This is just a demo dropzone. Selected files are
                            <strong>not</strong> actually uploaded.)</span>
                    </div>
                </form>
                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    Dropzone.autoDiscover = false;

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Dropzone
        const myDropzone = new Dropzone("#singleFileUpload", {
            maxFilesize: 50, // MB
            acceptedFiles: '', // Limit file types
            paramName: 'file', // The name that will be used to transfer the file
            dictDefaultMessage: "Drag and drop files here or click to upload.",
            init: function () {
                this.on("success", function (file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'File Uploaded Successfully',
                        text: 'Your file has been uploaded.'
                    });
                    // Optionally, close the modal after upload
                    $('#uploadFileModal').modal('hide');
                });
                this.on("error", function (file, errorMessage) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed',
                        text: errorMessage || 'An error occurred during the upload.'
                    });
                });
            }
        });


    });
    $(document).ready(function () {
        // Initially set to list view
        $('#grid-view-btn').click(function () {
            $('.grid-view').removeClass('d-none');
            $('.list-view').addClass('d-none');
            $(this).addClass('active');
            $('#list-view-btn').removeClass('active');
        });

        $('#list-view-btn').click(function () {
            $('.list-view').removeClass('d-none');
            $('.grid-view').addClass('d-none');
            $(this).addClass('active');
            $('#grid-view-btn').removeClass('active');
        });
    });

</script>

@endsection
