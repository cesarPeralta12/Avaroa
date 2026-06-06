@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css')}}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Chart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Widgets</li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid chart-widget">
        <!-- Chart widget top Start-->
        <div class="row">
            <div class="col-lg-4 col-md-6 box-col-33">
                <div class="card o-hidden">
                    <div class="chart-widget-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <h6 class="f-w-600 font-primary">SALE</h6><span class="num"><span
                                            class="counter">90</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                                </div>
                                <div class="col-7 text-end">
                                    <h4 class="num total-value">$ <span class="counter">3654</span>.00</h4>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="chart-widget1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 box-col-33">
                <div class="card o-hidden">
                    <div class="chart-widget-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="f-w-600 font-secondary">PROJECTS</h6><span class="num"><span
                                            class="counter">30</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                                </div>
                                <div class="col-5 text-end">
                                    <h4 class="num total-value counter">12569</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart-widget2">
                            <div class="flot-chart-placeholder" id="chart-widget-top-second"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 box-col-33">
                <div class="card o-hidden">
                    <div class="chart-widget-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="f-w-600 font-success">PRODUCTS</h6><span class="num"><span
                                            class="counter">68</span>%<i class="icon-angle-up f-12 ms-1"></i></span>
                                </div>
                                <div class="col-4 text-end">
                                    <h4 class="num total-value"><span class="counter">93</span>M</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart-widget3">
                            <div class="flot-chart-placeholder" id="chart-widget-top-third"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart widget top Ends-->
        <!-- Chart widget with bar chart Start-->
        <div class="row">
            <div class="col-lg-7 col-md-12 box-col-7">
                <div class="card o-hidden">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Marketing Expenses</h4>
                            </div>
                        </div>
                    </div>
                    <div class="bar-chart-widget">
                        <div class="bottom-content card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div id="chart-widget4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 box-col-5">
                <div class="card o-hidden">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Total Earning</h4>
                            </div>
                        </div>
                    </div>
                    <div class="bar-chart-widget">
                        <div class="top-content bg-primary"></div>
                        <div class="bottom-content card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div id="chart-widget5"> </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-4 b-r-light">
                                    <div><span class="font-secondary f-w-600 f-16">12%<i
                                                class="icon-angle-up f-12 ms-1"></i></span><span
                                            class="text-muted block-bottom">Year</span>
                                        <h4 class="num m-0"><span class="counter color-bottom">3659</span>M</h4>
                                    </div>
                                </div>
                                <div class="col-4 b-r-light">
                                    <div><span class="font-secondary f-w-600 f-16">15%<i
                                                class="icon-angle-up f-12 ms-1"></i></span><span
                                            class="text-muted block-bottom">Month</span>
                                        <h4 class="num m-0"><span class="counter color-bottom">698</span>M</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div><span class="font-secondary f-w-600 f-16">34%<i
                                                class="icon-angle-up f-12 ms-1"></i></span><span
                                            class="text-muted block-bottom">Today</span>
                                        <h4 class="num m-0"><span class="counter color-bottom">9361</span>M</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 box-col-5">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Skill Status</h4>
                            </div>
                            <div class="text-end"><i class="text-muted" data-feather="trending-up"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="circlechart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 box-col-7">
                <div class="card order-chart">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Order Status</h4>
                            </div>
                            <div class="text-end"><i class="text-muted" data-feather="shopping-bag"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="progress1"></div>
                            <div id="progress2"></div>
                            <div id="progress3"></div>
                            <div id="progress4"></div>
                            <div id="progress5"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart widget with bar chart Ends-->
        <!-- small widgets Start-->
        <div class="row">
            <!-- Live Product chart widget Start-->
            <div class="xl-50 col-lg-7 box-col-7">
                <div class="small-chart-widget chart-widgets-small">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>Live Products</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart-widget6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;div id="chart-widget6"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Live Product chart widget Ends-->
            <!-- Turnover chart widget Start-->
            <div class="xl-50 col-lg-5 box-col-5">
                <div class="small-chart-widget chart-widgets-small">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>Turnover</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart-widget7"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;div id="chart-widget7"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Turnover chart widget Ends-->
            <!-- Monthly Sale chart widget Start-->
            <div class="xl-50 col-lg-5 box-col-5">
                <div class="small-chart-widget chart-widgets-small">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>Monthly Sales</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart-widget8"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="example-head2">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;div id="chart-widget8"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Monthly Sale chart widget Ends-->
            <!-- Uses chart widget Start-->
            <div class="xl-50 col-lg-7 box-col-7">
                <div class="small-chart-widget chart-widgets-small">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>Uses</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart-widget9"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="example-head3">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="chart-container"&gt;
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;div id="chart-widget9"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Uses chart widget Ends-->
            <!-- small widgets Ends-->
            <!-- Browser uses and website visiter widget Start-->
        </div>
        <div class="row">
            <!-- browser uses widget chart Start-->
            <div class="col-sm-12 box-col-12">
                <div class="donut-chart-widget">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>Browser Uses</h4>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-light"><i class="icon-layout-grid2"></i></div>
                                        </li>
                                        <li><i class="view-html fa fa-code font-white"></i></li>
                                        <li><i class="icofont icofont-maximize full-card font-white"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card font-white"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card font-white"></i></li>
                                        <li><i class="icofont icofont-error close-card font-white"> </i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-widget13"></div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4"
                                    title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                <pre><code class="language-html" id="example-head4">&lt;!-- Cod Box Copy begin --&gt;
&lt;div id="#chart-widget13"&gt;&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- browser uses widget chart Endss-->
            <!-- status widget Start-->
        </div>
        <div class="row">
            <div class="col-lg-5 box-col-5">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Finance</h4>
                            </div>
                            <div class="text-end"><i class="text-muted" data-feather="navigation"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="columnchart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 box-col-7">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4>Order Status</h4>
                            </div>
                            <div class="text-end"><i class="text-muted" data-feather="shopping-bag"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="linechart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- status widget Ends-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/chart-widget.js') }}"></script>
@endsection
