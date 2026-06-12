@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Sparkline Chart</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Charts</li>
            <li class="breadcrumb-item active">Sparkline Chart</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Simple Line Chart</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder" id="simple-line-chart-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Simple Bar Charts</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder" id="custom-line-chart"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Line Chart</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder line-chart-sparkline" id="line-chart-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Mouse Speed Chart</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder" id="mouse-speed-chart-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Bar Chart</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder" id="bar-chart-sparkline"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Pie chart</h4>
          </div>
          <div class="card-body chart-block">
            <div class="flot-chart-container">
              <div class="flot-chart-placeholder" id="pie-sparkline-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

@section('scripts')
<script src="{{ asset('assets/js/chart/sparkline/sparkline.js') }}"></script>
<script src="{{ asset('assets/js/chart/sparkline/sparkline-script.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>    
@endsection