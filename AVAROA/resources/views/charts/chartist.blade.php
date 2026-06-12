@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Chartist Chart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Charts</li>
                        <li class="breadcrumb-item active">Chartist Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Animating a Donut with Svg.animate</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-8 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Advanced SMIL Animations</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-6 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Bi-polar Line chart with area only</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-5 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>SVG Path animation</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-7 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Line chart with area</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-4 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Bi-polar bar chart</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-9 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Stacked bar chart</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-10 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Horizontal bar chart</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-11 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Extreme responsive configuration</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-12 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Simple line chart</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-1 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Holes in data</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-2 flot-chart-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Filled holes in data</h4>
                    </div>
                    <div class="card-body">
                        <div class="ct-3 flot-chart-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartist/chartist-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
