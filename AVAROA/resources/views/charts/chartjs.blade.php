@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>ChartJS Chart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Charts</li>
                        <li class="breadcrumb-item active">ChartJS Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Bar Chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <canvas id="myBarGraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Line Graph</h4>
                    </div>
                    <div class="card-body chart-block">
                        <canvas id="myGraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Radar Graph</h4>
                    </div>
                    <div class="card-body chart-block">
                        <canvas id="myRadarGraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Line Chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <canvas id="myLineCharts"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Doughnut Chart</h4>
                    </div>
                    <div class="card-body chart-block chart-vertical-center">
                        <canvas id="myDoughnutGraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Polar Chart</h4>
                    </div>
                    <div class="card-body chart-block chart-vertical-center">
                        <canvas id="myPolarGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartjs/chart.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
