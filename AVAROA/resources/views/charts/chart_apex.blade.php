@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Apex Chart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Charts</li>
                        <li class="breadcrumb-item active">Apex Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Basic Area Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="basic-apex"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Area Spaline Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="area-spaline"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Bar chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="basic-bar"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Column Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>
                            3D Bubble Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-bubble"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Stepline Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="stepline"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-12 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Column Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="annotationchart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Pie Chart </h4>
                    </div>
                    <div class="card-body apex-chart">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Donut Chart</h4>
                    </div>
                    <div class="card-body apex-chart">
                        <div id="donutchart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Mixed Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="mixedchart"> </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Candlestick Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="candlestick"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Radar Chart </h4>
                    </div>
                    <div class="card-body">
                        <div id="radarchart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Radial Bar Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="circlechart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
