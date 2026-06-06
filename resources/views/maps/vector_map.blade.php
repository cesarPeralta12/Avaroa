@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Vector Maps</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Maps</li>
                        <li class="breadcrumb-item active">Vector Maps</li>
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
                        <h4>VECTOR WORLD MAP</h4><span>Below Map is displaying the world map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="world-map"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR USA MAP</h4><span>Below Map is displaying the usa map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="usa"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR CANADA MAP</h4><span>Below Map is displaying the canada map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="canada"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR INDIA MAP</h4><span>Below Map is displaying the india map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="india"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR ASIA MAP</h4><span>Below Map is displaying the asia map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="asia"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR CANADA MAP</h4><span>Below Map is displaying the uk map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="uk"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR CHICAGO MAP</h4><span>Below Map is displaying the chicago map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="chicago"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>VECTOR AUSTRALIA MAP</h4><span>Below Map is displaying the australia map.</span>
                    </div>
                    <div class="card-body">
                        <div class="jvector-map-height" id="australia"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
    <script src="{{ asset('assets/js/vector-map/map-vector.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
