@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/vector-map.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Default</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid dashboard-default">
    <div class="row">
      <div class="col-xxl-6 col-xl-5 col-lg-6 dash-45 box-col-40">
        <div class="card profile-greeting">
          <div class="card-body">
            <div class="d-sm-flex d-block justify-content-between">
              <div class="flex-grow-1">
                <div class="weather d-flex">
                  <h2 class="f-w-400"> <span>28<sup><i class="fa fa-circle-o f-10"></i></sup>C </span></h2>
                  <div class="span sun-bg"><i class="icofont icofont-sun font-primary"></i></div>
                </div><span class="font-primary f-w-700">Sunny Day</span>
                <p>Beautiful Sunny Day Walk</p>
              </div>
              <div class="badge-group">
                <div class="badge badge-light-primary f-12"> <i class="fa fa-clock-o"></i><span id="txt"></span>
                </div>
              </div>
            </div>
            <div class="greeting-user">
              <div class="profile-vector">
                <ul class="dots-images">
                  <li class="dot-small bg-info dot-1"></li>
                  <li class="dot-medium bg-primary dot-2"></li>
                  <li class="dot-medium bg-info dot-3"></li>
                  <li class="semi-medium bg-primary dot-4"></li>
                  <li class="dot-small bg-info dot-5"></li>
                  <li class="dot-big bg-info dot-6"></li>
                  <li class="dot-small bg-primary dot-7"></li>
                  <li class="semi-medium bg-primary dot-8"></li>
                  <li class="dot-big bg-info dot-9"></li>
                </ul><img class="img-fluid" src="{{ ('assets/images/dashboard/default/profile.png') }}" alt="">
                <ul class="vector-image">
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon1.png') }}" alt=""></li>
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon3.png') }}" alt=""></li>
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon4.png') }}" alt=""></li>
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon5.png') }}" alt=""></li>
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon6.png') }}" alt=""></li>
                  <li> <img src="{{ ('assets/images/dashboard/default/ribbon7.png') }}" alt=""></li>
                </ul>
              </div>
              <h4><a href="user-profile.html"><span>Welcome Back</span> John </a><span class="right-circle"><i
                    class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
              <div><span class="badge badge-primary">Your 5</span><span
                  class="font-primary f-12 middle f-w-500 ms-2"> Task Is Pending</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 box-col-25">
        <div class="card total-revenue overflow-hidden">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Total Revenue<i class="fa fa-circle"></i>
                </p>
                <h4>96.564%</h4>
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
          <div class="card-body p-0">
            <div class="revenue-chart" id="revenue-chart"></div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#revenue"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="revenue">&lt;div class="card total-revenue overflow-hidden"&gt;
&lt;div class="card-header"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt;Total Revenue
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564%&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="revenue-chart" id="revenue-chart"&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
        <div class="card total-investment">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Total Investment<i class="fa fa-circle"> </i>
                </p>
                <h4>96.564%</h4>
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
            <div class="progress sm-progress-bar">
              <div class="progress-colors" role="progressbar" style="width: 100%" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100">
                <div class="bg-secondary progress-1"></div>
                <div class="bg-primary progress-2"></div>
              </div>
            </div>
            <div class="bottom-progress"><span class="badge round-badge-primary font-worksans">3.56% <i
                  class="fa fa-caret-up"></i></span><span
                class="pull-right font-primary font-worksans f-w-700">75%</span></div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#investment"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="investment">&lt;div class="card total-investment"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Total Investment
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564%&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="progress sm-progress-bar"&gt;
&lt;div class="progress-colors" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"&gt;
  &lt;div class="bg-secondary.progress-1"&gt;&lt;/div&gt;
  &lt;div class="bg-primary.progress-2"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-xl-4 col-md-6 dash-30 box-col-35">
        <div class="card our-user">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Our Total Users<i class="fa fa-circle"></i>
                </p>
                <h4>96.564%</h4>
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
            <div class="user-chart">
              <div id="user-chart"></div>
              <div class="icon-donut"><i data-feather="arrow-up-circle"></i></div>
            </div>
            <ul>
              <li>
                <p class="f-w-600 font-primary f-12">Desktop</p><span class="f-w-600">96.564%</span>
              </li>
              <li>
                <p class="f-w-600 font-primary f-12">Mobile </p><span class="f-w-600">92.624%</span>
              </li>
              <li>
                <p class="f-w-600 font-primary f-12">Tablet </p><span class="f-w-600">46.564%</span>
              </li>
            </ul>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#users"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="users">&lt;div class="card our-user"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Our Total Users
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564% &lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body"&gt;
&lt;div class="user-chart"&gt;
&lt;div id="user-chart"&gt;&lt;/div&gt;
&lt;div class="icon-donut"&gt;
  &lt;i class="feather feather-arrow-up-circle"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;ul&gt;
&lt;li&gt;
  &lt;p class="f-w-600 font-primary f-12"&gt; Desktop &lt;/p&gt;
  &lt;span class="f-w-600"&gt; 96.564% &lt;/span&gt;
&lt;/li&gt;
&lt;li&gt;
  &lt;p class="f-w-600 font-primary f-12"&gt; Mobile &lt;/p&gt;
  &lt;span class="f-w-600"&gt; 92.624% &lt;/span&gt;
&lt;/li&gt;
&lt;li&gt;
  &lt;p class="f-w-600 font-primary f-12"&gt; Tablet &lt;/p&gt;
  &lt;span class="f-w-600"&gt; 46.564% &lt;/span&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 box-col-30 xl-30">
        <div class="card our-earning">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Our Total Earning<i class="fa fa-circle"> </i>
                </p>
                <h4>96.564%</h4>
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
          </div>
          <div class="card-body p-0">
            <div class="earning-chart">
              <div id="earning-chart"></div>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#earning"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="earning">&lt;div class="card our-earning"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Our Total Earning
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564% &lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="earning-chart"&gt;
&lt;div id="earning-chart"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;ul class="d-sm-flex d-block"&gt;
&lt;li&gt;
  &lt;p class="f-w-600 font-primary f-12"&gt; Daily Earning
  &lt;span class="f-w-600"&gt; 96.564% &lt;/span&gt;
&lt;/li&gt;
&lt;li&gt;
  &lt;p class="f-w-600 font-primary f-12"&gt; Monthly Earning
  &lt;span class="f-w-600"&gt; 96.564% &lt;/span&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
          <div class="card-footer">
            <ul class="d-sm-flex d-block">
              <li>
                <p class="f-w-600 font-primary f-12">Daily Earning</p><span class="f-w-600">96.564%</span>
              </li>
              <li>
                <p class="f-w-600 font-primary f-12">Monthly Earning </p><span class="f-w-600">96.564%</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 box-col-40 xl-40">
        <div class="card appointment-detail">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">total appointment<i class="fa fa-circle"> </i>
                </p>
                <h4>12 meet</h4>
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
            <div class="table-responsive theme-scrollbar">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex"><img class="img-fluid align-top circle"
                          src="{{ ('assets/images/dashboard/default/01.png') }}" alt="">
                        <div class="flex-grow-1"><a href="{{ route('user_profile') }}"><span>Ossim keter</span></a>
                          <p class="mb-0">1 Hour</p>
                        </div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>16 August </td>
                    <td class="text-end">
                      <button class="btn btn-primary" type="button"
                        onclick="document.location='user-cards.html'">Pending</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex"><img class="img-fluid align-top circle"
                          src="{{ ('assets/images/dashboard/default/02.png') }}" alt="">
                        <div class="flex-grow-1"><a href="{{ route('user_profile') }}"><span>Venter loren</span></a>
                          <p class="mb-0">Now</p>
                        </div>
                        <div class="active-status active-busy"></div>
                      </div>
                    </td>
                    <td>21 September </td>
                    <td class="text-end">
                      <button class="btn btn-secondary" type="button"
                        onclick="document.location='user-cards.html'">Done<i
                          class="fa fa-check-circle"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex"><img class="img-fluid align-top circle"
                          src="{{ ('assets/images/dashboard/default/03.png') }}" alt="">
                        <div class="flex-grow-1"><a href="{{ route('user_profile') }}"><span>Fran loain</span></a>
                          <p class="mb-0">2 Day After</p>
                        </div>
                        <div class="active-status active-offline"></div>
                      </div>
                    </td>
                    <td>06 March</td>
                    <td class="text-end">
                      <button class="btn btn-success" type="button"
                        onclick="document.location='user-cards.html'">Pending</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex"><img class="img-fluid align-top circle"
                          src="{{ ('assets/images/dashboard/default/04.png') }}" alt="">
                        <div class="flex-grow-1"><a href="{{ route('user_profile') }}"><span>Loften Horen</span></a>
                          <p class="mb-0">Day End</p>
                        </div>
                        <div class="active-status active-online"></div>
                      </div>
                    </td>
                    <td>12 February</td>
                    <td class="text-end">
                      <button class="btn btn-info" type="button"
                        onclick="document.location='user-cards.html'">Pending</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex"><img class="img-fluid align-top circle"
                          src="{{ ('assets/images/dashboard/default/05.png') }}" alt="">
                        <div class="flex-grow-1"><a href="{{ route('user_profile') }}"><span>Loie fenter</span></a>
                          <p class="mb-0">2 Day After</p>
                        </div>
                        <div class="active-status active-offline"></div>
                      </div>
                    </td>
                    <td>06 March</td>
                    <td class="text-end">
                      <button class="btn btn-danger" type="button"
                        onclick="document.location='user-cards.html'">Pending</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#appoinment"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="appoinment">&lt;div class="card appointment-detail"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; total appointment
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 12 meet &lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body"&gt;
&lt;div class="table-responsive theme-scrollbar"&gt;
&lt;table class="table"&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;
        &lt;div class="d-flex"&gt;
          &lt;img class="img-fluid align-top circle" src="../assets/images/dashboard/default/01.png" alt=""&gt;&lt;/img&gt;
          &lt;div class="flex-grow-1"&gt;
            &lt;a  href="user-profile.html"&gt;
              &lt;span&gt;Ossim keter&lt;/span&gt;
            &lt;/a&gt;
            &lt;p class="mb-0"&gt; 1 Hour &lt;/p&gt;
          &lt;/div&gt;
          &lt;div class="active-status active-online"&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/td&gt;
      &lt;td&gt; 16 august &lt;/td&gt;
      &lt;td class="text-end"&gt;
        &lt;button class="btn btn-primary" type="button" onclick="document.location='user-cards.html'"&gt; Pending &lt;/button&gt;
      &lt;/td&gt; 
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;
        &lt;div class="d-flex"&gt;
          &lt;img class="img-fluid align-top circle" src="../assets/images/dashboard/default/02.png" alt=""&gt;&lt;/img&gt;
          &lt;div class="flex-grow-1"&gt;
            &lt;a href="user-profile.html"&gt;
              &lt;span&gt;Venter loren&lt;/span&gt;
            &lt;/a&gt;
            &lt;p class="mb-0"&gt; Now &lt;/p&gt;
          &lt;/div&gt;
          &lt;div class="active-status active-busy"&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/td&gt;
      &lt;td&gt; 21 September &lt;/td&gt;
      &lt;td class="text-end"&gt;
        &lt;button class="btn btn-secondary" type="button" onclick="document.location='user-cards.html'"&gt; Done 
          &lt;i class="fa fa-check-circle"&gt;
        &lt;/button&gt;
      &lt;/td&gt; 
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;
        &lt;div class="d-flex"&gt;
          &lt;img class="img-fluid align-top circle" src="../assets/images/dashboard/default/03.png" alt=""&gt;&lt;/img&gt;
          &lt;div class="flex-grow-1"&gt;
            &lt;a href="user-profile.html"&gt;
              &lt;span&gt;Fran loain&lt;/span&gt;
            &lt;/a&gt;
            &lt;p class="mb-0"&gt; 2 Day After &lt;/p&gt;
          &lt;/div&gt;
          &lt;div class="active-status active-online"&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/td&gt;
      &lt;td&gt; 06 March &lt;/td&gt;
      &lt;td class="text-end"&gt;
        &lt;button class="btn btn-success" type="button" onclick="document.location='user-cards.html'"&gt; Pending &lt;/button&gt;
      &lt;/td&gt; 
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;
        &lt;div class="d-flex"&gt;
          &lt;img class="img-fluid align-top circle" src="../assets/images/dashboard/default/04.png" alt=""&gt;&lt;/img&gt;
          &lt;div class="flex-grow-1"&gt;
            &lt;a href="user-profile.html"&gt;
              &lt;span&gt;Loften Horen&lt;/span&gt;
            &lt;/a&gt;
            &lt;p class="mb-0"&gt; Day End &lt;/p&gt;
          &lt;/div&gt;
          &lt;div class="active-status active-online"&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/td&gt;
      &lt;td&gt; 12 February &lt;/td&gt;
      &lt;td class="text-end"&gt;
        &lt;button class="btn btn-info" type="button" onclick="document.location='user-cards.html'"&gt; Pending &lt;/button&gt;
      &lt;/td&gt; 
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;
        &lt;div class="d-flex"&gt;
          &lt;img class="img-fluid align-top circle" src="../assets/images/dashboard/default/05.png" alt=""&gt;&lt;/img&gt;
          &lt;div class="flex-grow-1"&gt;
            &lt;a href="user-profile.html"&gt;
              &lt;span&gt;Loie fenter&lt;/span&gt;
            &lt;/a&gt;
            &lt;p class="mb-0"&gt; 2 Day After &lt;/p&gt;
          &lt;/div&gt;
          &lt;div class="active-status active-offline"&gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/td&gt;
      &lt;td&gt; 06 March &lt;/td&gt;
      &lt;td class="text-end"&gt;
        &lt;button class="btn btn-danger" type="button" onclick="document.location='user-cards.html'"&gt; Pending &lt;/button&gt;
      &lt;/td&gt; 
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 box-col-30 xl-30">
        <div class="card use-country">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">User By Country<i class="fa fa-circle"> </i>
                </p>
                <h4>96.564%</h4>
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
            <div class="jvector-map-height" id="asia"></div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#country"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="country">&lt;div class="card use-country"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; User By Country
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564%&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="jvector-map-height" id="asia"&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 box-col-12">
        <div class="card total-growth">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Our Total Growth<i class="fa fa-circle"> </i>
                </p>
                <h4>96.564%</h4>
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
          <div class="card-body pb-0">
            <div class="growth-chart">
              <div id="growth-chart"></div>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#growth"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="growth">&lt;div class="card total-growth"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Our Total Growth
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; 96.564%&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="growth-chart"&gt;
&lt;div id="growth-chart"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 box-col-33">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Recent Activity<i class="fa fa-circle"> </i>
                </p>
                <h4>New & Update</h4>
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
            <div class="activity-timeline">
              <div class="d-flex">
                <div class="activity-line"></div>
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1"><span class="f-w-600 d-block">Updated Product</span>
                  <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt enim.</p>
                </div>
              </div>
              <div class="d-flex">
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1"><span class="f-w-600 d-block">You liked James products</span>
                  <p class="mb-0">Aenean sit amet magna vel magna fringilla ferme.</p>
                </div>
              </div>
              <div class="d-flex align-items-start">
                <div class="activity-dot-secondary"></div>
                <div class="flex-grow-1"><span class="f-w-600 d-block">James just like your product</span>
                  <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt enim.</p>
                </div><i class="fa fa-circle circle-dot-primary"></i>
              </div>
              <div class="d-flex">
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1"><span class="f-w-600 d-block">Jenna commented on your product</span>
                  <p class="mb-0">Curabitur egestas consequat lorem.</p>
                </div>
              </div>
              <div class="d-flex align-items-start">
                <div class="activity-dot-secondary"></div>
                <div class="flex-grow-1"><span class="f-w-600 d-block">Jihan Doe just like your product</span>
                  <p class="mb-0">Vestibulum nec mi suscipit, dapibus purus a consequat ane.Curabitur egestas
                    consequat lorem.</p>
                </div><i class="fa fa-circle circle-dot-secondary"></i>
              </div>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#activity"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="activity">&lt;div class="card"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Recent Activity
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; New & Update &lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="activity-timeline"&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-line"&gt;&lt;/div&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;span class="f-w-600 d-block"&gt; Updated Product &lt;/span &gt;
    &lt;p class="mb-0"&gt; Quisque a consequat ante Sit amet magna at volutapt enim.&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;span class="f-w-600 d-block"&gt; You liked James products &lt;/span &gt;
    &lt;p class="mb-0"&gt; Aenean sit amet magna vel magna fringilla ferme.&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex align-items-start"&gt;
  &lt;div class="activity-dot-secondary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;span class="f-w-600 d-block"&gt; James just like your product &lt;/span &gt;
    &lt;p class="mb-0"&gt; Quisque a consequat ante Sit amet magna at volutapt enim.&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;span class="f-w-600 d-block"&gt; Jenna commented on your product &lt;/span &gt;
    &lt;p class="mb-0"&gt;Curabitur egestas consequat lorem.&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex align-items-start"&gt;
  &lt;div class="activity-dot-secondary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;span class="f-w-600 d-block"&gt; James just like your product &lt;/span &gt;
    &lt;p class="mb-0"&gt;Vestibulum nec mi suscipit, dapibus purus a consequat ane.Curabitur egestas consequat lorem.&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt; </code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 proorder box-col-33">
        <div class="card user-chat">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Chat With Our Users<i class="fa fa-circle">
                  </i></p>
                <h4>Chat</h4>
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
          <div class="card-body chat-box">
            <div class="d-flex left-chat">
              <div class="flex-grow-1">
                <div class="message-main">
                  <p class="mb-0">Hii</p>
                </div>
                <div class="sub-message message-main">
                  <p class="mb-0">Good Evening, My Friend</p>
                </div>
              </div>
              <p class="f-w-500 mb-0 px-0">7:28 PM</p>
            </div>
            <div class="d-flex right-chat">
              <div class="flex-grow-1 text-end">
                <div class="message-main pull-right">
                  <p class="text-start mb-0">What can do for you</p>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="d-flex left-chat">
              <div class="flex-grow-1">
                <div class="sub-message message-main mt-0">
                  <p class="mb-0">Can i Borrow some money</p>
                </div>
              </div>
            </div>
            <div class="input-group">
              <input class="form-control" id="mail" type="text" placeholder="Type Your Message" name="text">
              <div class="send-msg"><i data-feather="send"></i></div>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#chat"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="chat">&lt;div class="card user-chat"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Chat With Our Users
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; Chat&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body chat-box"&gt;
&lt;div class="d-flex left-chat"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;div class="message-main"&gt; 
    &lt;p class="mb-0"&gt; Hii &lt;/p&gt;
  &lt;/div &gt;
  &lt;div class="sub-message message-main"&gt; 
    &lt;p class="mb-0"&gt; Good Evening, My Friend &lt;/p&gt;
  &lt;/div &gt;
&lt;/div&gt;
&lt;p class="f-w-500 mb-0 px-0"&gt; 7:28 PM &lt;/p&gt;
&lt;/div&gt;
&lt;div class="d-flex right-chat"&gt;
&lt;div class="flex-grow-1 text-end"&gt;
  &lt;div class="message-main pull-right"&gt; 
    &lt;p class="text-start mb-0"&gt; What can do for you &lt;/p&gt;
    &lt;div class="clearfix"&gt;&lt;/div&gt;
  &lt;/div &gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex left-chat"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;div class="sub-message message-main mt-0"&gt; 
    &lt;p class="mb-0"&gt; Can i Borrow some money &lt;/p&gt;
  &lt;/div &gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="input-group"&gt;
&lt;input id="mail" class="form-control" type="text" placeholder="Type Your Message" name="text"/&gt;
&lt;div class="send-msg"&gt;
  &lt;i class="feather feather-send"&gt;&lt;/i&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 box-col-33">
        <div class="card our-todolist">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <div class="flex-grow-1">
                <p class="square-after f-w-600 header-text-primary">Our To-Do List<i class="fa fa-circle"> </i>
                </p>
                <h4>Todo List</h4>
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
            <div class="activity-timeline todo-timeline">
              <div class="d-flex">
                <div class="activity-line"></div>
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1">
                  <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today</p>
                  <div class="d-flex mt-0"><img class="img-fluid img-30"
                      src="{{ asset('assets/images/dashboard/default/todo.png') }}" alt="">
                    <div class="flex-grow-1"><span class="f-w-600">New Order $2340<i
                          class="fa fa-circle circle-dot-primary pull-right"></i></span>
                      <p class="mb-0">Update New Product Pdf And Delivery Product</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex">
                <div class="activity-dot-secondary"></div>
                <div class="flex-grow-1">
                  <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today<span
                      class="badge badge-primary ms-2">New</span></p><span class="f-w-600">James just like your
                    product<i class="fa fa-circle circle-dot-secondary pull-right"></i></span>
                </div>
              </div>
              <div class="d-flex">
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1">
                  <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today</p><span
                    class="f-w-600">Jihan Doe just like your product</span>
                  <p class="mb-0">Vestibulum nec mi suscipit, dapibus purus a consequat ane.Quisque a consequat
                    ante.....</p>
                </div>
              </div>
              <div class="d-flex">
                <div class="activity-dot-primary"></div>
                <div class="flex-grow-1">
                  <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today</p><span
                    class="f-w-600">Take Our Client Metting<i
                      class="fa fa-circle circle-dot-primary pull-right"></i></span>
                  <p class="mb-0">Vestibulum nec mi suscipit.</p>
                </div>
              </div>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#to-do"><i
                  class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="to-do">&lt;div class="card our-todolist"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="square-after f-w-600 header-text-primary"&gt; Our To-Do List
    &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
  &lt;/p&gt;
  &lt;h4&gt; Todo List &lt;/h4&gt;
&lt;/div&gt;
&lt;div class="setting-list"&gt;
  &lt;ul class="list-unstyled setting-option"&gt;
    &lt;li&gt;&lt;div class="setting-light"&gt;&lt;i class="icon-layout-grid2"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
    &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-body p-0"&gt;
&lt;div class="activity-timeline"&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-line"&gt;&lt;/div&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;p class="todo-font mt-0"&gt;
      &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
      Today
    &lt;/p &gt;
    &lt;div class="d-flex mt-0"&gt;
      &lt;img class="img-fluid img-30" src="../assets/images/dashboard/default/todo.png" alt=""/&gt;
      &lt;div class="flex-grow-1"&gt;
        &lt;span class="f-w-600"&gt; New Order $2340
          New Order $2340
          &lt;i class="fa fa-circle circle-dot-primary pull-right"&gt;
        &lt;/span&gt;
        &lt;p class="mb-0"&gt; Update New Product Pdf And Delivery Product &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-dot-secondary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;p class="todo-font mt-0"&gt;
      &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
      Today
      &lt;span class="badge badge-primary ms-2"&gt; New &lt;/span&gt;
    &lt;/p &gt;
    &lt;span class="f-w-600"&gt; James just like your product
      &lt;i class="fa fa-circle circle-dot-secondary pull-right"&gt;&lt;/i&gt;
    &lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;p class="mt-0 todo-font"&gt;
      &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
      Today
    &lt;/p &gt;
    &lt;span class="f-w-600"&gt; Jihan Doe just like your product
    &lt;/span&gt;
    &lt;p class="mb-0"&gt; Vestibulum nec mi suscipit, dapibus purus a consequat ane.Quisque a consequat ante..... &lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex"&gt;
  &lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
  &lt;div class="flex-grow-1"&gt;
    &lt;p class="todo-font mt-0"&gt;
      &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
      Today
    &lt;/p &gt;
    &lt;span class="f-w-600"&gt; Take Our Client Metting
      &lt;i class="fa fa-circle circle-dot-primary pull-right"&gt;&lt;/i&gt;
    &lt;/span&gt;
    &lt;p class="mb-0"&gt; Vestibulum nec mi suscipit. &lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt; </code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

@section('scripts')
<script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
<script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script>
     localStorage.clear();
     localStorage.setItem('body-wrapper', 'box-layout');
 </script>
@endsection