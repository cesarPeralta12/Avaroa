@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Ribbons</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Bonus Ui</li>
                        <li class="breadcrumb-item active">Ribbons</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <!-- ribbon left (default) side-->
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Colored Ribbons</h4><span>use class <code>.ribbon-colored .ribbon-primary</code></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card ribbon-wrapper">
                                    <div class="card-body">
                                        <div class="ribbon ribbon-primary ribbon-space-bottom">Ribbon</div>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card ribbon-wrapper">
                                    <div class="card-body">
                                        <div class="ribbon ribbon-info ribbon-space-bottom">Ribbon</div>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card ribbon-wrapper">
                                    <div class="card-body">
                                        <div class="ribbon ribbon-success ribbon-space-bottom">Ribbon</div>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- demo ribbon end here-->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-secondary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-success">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-info">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-warning">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-danger">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ribbon right side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-secondary ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-success ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-info ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-warning ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-danger ribbon-right">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ribbon vertical left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-secondary ribbon-vertical-left"><i class="icofont icofont-love"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-primary ribbon-vertical-left"><i class="icon-gift"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-success ribbon-vertical-left"><i class="icon-signal"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ribbon vertical right side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-info ribbon-vertical-right"><i class="fa fa-chain-broken"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-warning ribbon-vertical-right"><i class="fa fa-ticket"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-danger ribbon-vertical-right"><i class="fa fa-taxi"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-secondary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-primary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-success">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon right side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-right ribbon-info">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-right ribbon-warning">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ribbon bookmark vertical left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-left ribbon-secondary"><i
                                class="icofont icofont-love"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-left ribbon-primary"><i class="icon-gift"></i>
                        </div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-left-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-left ribbon-success"><i
                                class="icon-signal"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ribbon bookmark vertical right side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-info"><i
                                class="icofont icofont-love"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-warning"><i class="icon-gift"></i>
                        </div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-vertical-right-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-danger"><i
                                class="icon-signal"></i></div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip ribbon-secondary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip ribbon-primary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip ribbon-success">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon right side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-right ribbon-right ribbon-info">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-right ribbon-right ribbon-warning">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-right card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-right ribbon-right ribbon-danger">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom ribbon-secondary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom ribbon-primary">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom ribbon-success">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bookmark ribbon left side-->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom-right ribbon-info">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom-right ribbon-warning">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="ribbon-wrapper-bottom card">
                    <div class="card-body">
                        <div class="ribbon ribbon-clip-bottom-right ribbon-danger">Ribbon</div>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
