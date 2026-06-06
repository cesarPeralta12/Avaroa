@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Flot Chart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Charts</li>
                        <li class="breadcrumb-item active">Flot Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row all-chart">
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Real-Time Updates</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="real-time-update"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Multiple Real-Time Updates</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="multiple-real-timeupdate"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Error chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="error-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Adding Annotations chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="annotations-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Basic chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="flot-basic-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Categories Chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="flot-categories"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Toggling Series Chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder float-start" id="toggling-series-flot"></div>
                            <p class="float-end" id="choices"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Stacking chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="stacking-flot-chart"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Default pie chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="default-pie-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Default pie chart (Interactive)</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="default-pie-flot-chart-hover"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Default pie chart without legend</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="default-pie-legend-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Custom Label Formatter</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="custom-label1pie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Label Radius chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="label-radius-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Hidden Labels chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="hidden-label-radius-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Tilted Pie chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="title-pie-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6 box-col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Donut Hole chart</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="dount-hole-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/flot-chart/excanvas.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('assets/js/chart/flot-chart/flot-script.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
