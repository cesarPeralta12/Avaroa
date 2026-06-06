@extends('layout.master')

@section('css')

@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Knob Chart</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Charts</li>
            <li class="breadcrumb-item active">Knob Chart</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Clock</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center knob-chart">
              <div class="chart-clock-main">
                <div class="clock-large">
                  <input class="knob hour" data-min="0" data-max="24" data-bgcolor="#eeeeee" data-fgcolor="#5c61f2" data-displayinput="false" data-width="300" data-height="300" data-thickness=".2">
                </div>
                <div class="clock-medium">
                  <input class="knob minute" data-min="0" data-max="60" data-bgcolor="#eeeeee" data-fgcolor="#dc3545" data-displayinput="false" data-width="200" data-height="200" data-thickness=".20">
                </div>
                <div class="clock-small">
                  <input class="knob second" data-min="0" data-max="60" data-bgcolor="#eeeeee" data-fgcolor="#51bb25" data-displayinput="false" data-width="100" data-height="100" data-thickness=".2">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Tron</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-width="295" data-height="295" data-angleoffset="180" data-fgcolor="#5c61f2" data-skin="tron" data-thickness=".1" value="35">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Angle Offset</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-width="200" data-thickness=".1" data-angleoffset="90" data-fgcolor="#5c61f2" data-linecap="round" value="35">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Disable Display Input</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center knob-input-disable">
              <input class="knob" data-width="200" data-thickness=".1" data-fgcolor="#5c61f2" data-displayinput="false" value="35">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Cursor Mode</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-width="200" data-cursor="true" data-fgcolor="#5c61f2" data-thickness=".1" value="29">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Display Previous Value</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-width="200" data-thickness=".1" data-fgcolor="#5c61f2" data-min="-100" data-displayprevious="true" value="44">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Angle Offset & Arc</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-angleoffset="-125" data-anglearc="250" data-fgcolor="#5c61f2" data-thickness=".1" data-rotation="anticlockwise" value="35">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 col-md-6 box-col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>4-digit, step 0.1</h4>
          </div>
          <div class="card-body">
            <div class="knob-block text-center">
              <input class="knob" data-min="-10000" data-thickness=".1" data-fgcolor="#5c61f2" data-displayprevious="true" data-max="10000" data-step=".1" value="0">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

@section('scripts')
<script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>    
@endsection