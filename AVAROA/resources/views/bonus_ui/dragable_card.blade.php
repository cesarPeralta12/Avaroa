@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Draggable Card</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Bonus Ui</li>
                        <li class="breadcrumb-item active">Draggable Card</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row ui-sortable" id="draggableMultiple">
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Basic Card</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="card shadow-none border">
                    <div class="card-header pb-0">
                        <h4>Without shadow Card</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="card b-r-0">
                    <div class="card-header pb-0">
                        <h4>Flat Card</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4><i class="icon-move me-2"></i> Icon in Heading</h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Card sub Title</h4><span>Using the <a href="#">card</a> component, you can extend the
                            default collapse behavior to create an accordion.</span>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Card sub Title</h4><span>Using the <a href="#">card</a> component, you can extend the
                            default collapse behavior to create an accordion.</span>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/dragable/sortable.js') }}"></script>
    <script src="{{ asset('assets/js/dragable/sortable-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endsection
