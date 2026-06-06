@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Dropzone</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bonus Ui</li>
            <li class="breadcrumb-item active">Dropzone</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Single File Upload</h4>
          </div>
          <div class="card-body">
            <form class="dropzone" id="singleFileUpload" action="/upload.php">
              <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Multi File Upload</h4>
          </div>
          <div class="card-body">
            <form class="dropzone dropzone-primary" id="multiFileUpload" action="/upload.php">
              <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>File Type Validation</h4>
          </div>
          <div class="card-body">
            <form class="dropzone dropzone-info" id="fileTypeValidation" action="/upload.php">
              <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>   
@endsection

@section('scripts')
<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>    
@endsection




