@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sticky.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Sticky</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bonus Ui</li>
            <li class="breadcrumb-item active">Sticky</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts                    -->
  <div class="container-fluid">
    <div class="row sticky-header-main">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Sticky Note <a class="btn btn-primary pull-right m-l-10" id="add_new" href="javascript:;">Add New Note</a></h4>
          </div>
          <div class="card-body">
            <div class="sticky-note" id="board"></div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery.ui.min.js') }}"></script>
<script src="{{ asset('assets/js/sticky/sticky.js') }}"></script>    
@endsection




