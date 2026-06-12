@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Breadcrumb</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bonus Ui</li>
            <li class="breadcrumb-item active">Breadcrumb</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <!-- default breadcrumb start-->
      <div class="col-sm-12 col-lg-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Default bootstrap breadcrumb</h4><span>use class <code>.breadcrumb to ol</code></span>
          </div>
          <div class="card-body">
            <ol class="breadcrumb bg-white p-t-0 p-l-0">
              <li class="breadcrumb-item active">Home</li>
            </ol>
            <ol class="breadcrumb bg-white p-l-0">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb bg-white p-l-0">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Library</a></li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
            <ol class="breadcrumb bg-white m-b-0 p-b-0 p-l-0">
              <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item">Library</li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- default breadcrumb ends-->
      <!-- Nav breadcrumb start-->
      <div class="col-sm-12 col-lg-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Nav breadcrumb</h4><span>use class <code>.breadcrumb to nav</code> similar to navigation</span>
          </div>
          <div class="card-body">
            <nav class="breadcrumb"><a class="breadcrumb-item" href="javascript:void(0)">Home</a><a class="breadcrumb-item" href="javascript:void(0)">Library</a><span class="breadcrumb-item active">Bootstrap</span></nav>
            <nav class="breadcrumb breadcrumb-icon"><a class="breadcrumb-item" href="javascript:void(0)">Home</a><a class="breadcrumb-item" href="javascript:void(0)">Library</a><span class="breadcrumb-item active">Bootstrap</span></nav>
            <nav class="breadcrumb breadcrumb-no-divider"><a class="breadcrumb-item" href="javascript:void(0)">Home</a><a class="breadcrumb-item" href="javascript:void(0)">Library</a><span class="breadcrumb-item active">Bootstrap</span></nav>
            <nav class="breadcrumb mb-0"><a class="breadcrumb-item" href="javascript:void(0)"><i class="fa fa-home"></i></a><a class="breadcrumb-item" href="javascript:void(0)">Library</a><span class="breadcrumb-item active">Bootstrap</span></nav>
          </div>
        </div>
      </div>
      <!-- Nav breadcrumb ends-->
      <!-- colored navigation start-->
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Colored breadcrumb</h4><span>use class <code>.breadcrumb-colored .bg-primary</code></span>
          </div>
          <div class="card-body">
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-primary">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-secondary">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-success">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-info">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-warning">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-danger">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-light">
              <li class="breadcrumb-item"><a class="txt-dark" href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item txt-dark active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-0 bg-dark">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- colored navigation start-->
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Outline Colored breadcrumb</h4><span>use class <code>.breadcrumb-colored .bg-primary</code></span>
          </div>
          <div class="card-body">
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-primary">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-secondary">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-success">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-info">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-warning">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-danger">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-30 bg-outline-light">
              <li class="breadcrumb-item"><a class="txt-dark" href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item txt-dark active">Library</li>
            </ol>
            <ol class="breadcrumb breadcrumb-colored m-b-0 bg-outline-dark">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
