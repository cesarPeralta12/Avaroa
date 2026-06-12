@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>sweet Alert</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Bonus Ui</li>
                        <li class="breadcrumb-item active">sweet Alert</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts                    -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Basic Examples</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-showcase">
                            <button class="btn btn-primary sweet-1" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Basic</button>
                            <button class="btn btn-secondary sweet-2" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-2']);">With Title alert</button>
                            <button class="btn btn-success sweet-3" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-3']);">Success alert</button>
                            <button class="btn btn-info sweet-4" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-4']);">Info alert</button>
                            <button class="btn btn-danger sweet-5" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);">Danger alert</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Advanced State</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-showcase">
                            <button class="btn btn-primary sweet-12" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-12']);">Primary</button>
                            <button class="btn btn-secondary sweet-11" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-11']);">Secondary</button>
                            <button class="btn btn-success sweet-13" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-13']);">Success</button>
                            <button class="btn btn-info sweet-10" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-10']);">Info</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Alert State</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-showcase">
                            <button class="btn btn-primary sweet-8" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-8']);">Primary</button>
                            <button class="btn btn-secondary sweet-7" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-7']);">Secondary</button>
                            <button class="btn btn-success sweet-9" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-9']);">Success</button>
                            <button class="btn btn-info sweet-6" type="button"
                                onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-6']);">Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
