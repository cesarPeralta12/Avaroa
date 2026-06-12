@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Timeline 2</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Timeline</li>
                        <li class="breadcrumb-item active">Timeline 2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Example</h4>
                    </div>
                    <div class="card-body">
                        <div id="timeline-2">
                            <div data-year="2017">Start</div>
                            <div class="active" data-year="2018">Make sure you pick out a good luck new job card to go with the words, and pop a beautiful bunch of flowers from our gift range in your basket.</div>
                            <div data-year="2019">This is the content of the Final Testing.
                            </div>
                            <div data-year="2020">Lorem is simply dummy text of the printing and typesetting industry.</div>
                            <div data-year="2021">Explain any new understanding or fresh insights about the problem. This is the content of the Final Testing.</div>
                            <div data-year="2022">flowers from our gift range in your basket, to make them feel super special.</div>
                            <div data-year="2023">End.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/timeline/timeline-v-2/jquery.timeliny.min.js') }}"></script>
    <script src="{{ asset('assets/js/timeline/timeline-v-2/timeline-v-2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
