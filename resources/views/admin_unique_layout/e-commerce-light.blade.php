@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Ecommerce</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Ecommerce</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-2">
        <div class="row">
            <div class="col-xl-9 col-md-12 box-col-70 xl-70">
                <div class="row">
                    <div class="col-lg-4 col-md-6 box-col-4">
                        <div class="card profit-card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="square-after f-w-600 header-text-primary">Our Total Profit<i
                                                class="fa fa-circle"> </i></p>
                                        <h4>$8,55,462</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="profit-wrapper header-text-primary icon-bg-primary"><i
                                                class="fa fa-arrow-up"></i></div>
                                        <h6 class="header-text-primary">79.21%</h6>
                                        <p class="mb-0">More Than last month</p>
                                    </div>
                                </div>
                                <div class="right-side icon-right-primary"><i class="fa fa-usd"></i>
                                    <div class="shap-block">
                                        <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 box-col-4">
                        <div class="card visitor-card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="square-after f-w-600 header-text-info">Our Total Visitor<i
                                                class="fa fa-circle"> </i></p>
                                        <h4>813K</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="profit-wrapper header-text-info icon-bg-info"><i
                                                class="fa fa-arrow-up"></i></div>
                                        <h6 class="header-text-info">86.94%</h6>
                                        <p class="mb-0">More Than last month</p>
                                    </div>
                                </div>
                                <div class="right-side icon-right-info"><i class="fa fa-user"></i>
                                    <div class="shap-block">
                                        <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 box-col-4">
                        <div class="card sell-card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="square-after f-w-600 header-text-success">Our Total Sold<i
                                                class="fa fa-circle"> </i></p>
                                        <h4>2,41,658</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="profit-wrapper header-text-success icon-bg-success"><i
                                                class="fa fa-arrow-up"></i></div>
                                        <h6 class="header-text-success">94.40%</h6>
                                        <p class="mb-0">Look Pretty Good</p>
                                    </div>
                                </div>
                                <div class="right-side icon-right-success"><i class="fa fa-shopping-basket"></i>
                                    <div class="shap-block">
                                        <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 box-col-12">
                        <div class="card best-seller">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="square-after f-w-600">Our Total Sold<i class="fa fa-circle"> </i></p>
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
                            <div class="card-body pt-0">
                                <div class="table-responsive theme-scrollbar">
                                    <table class="table table-bordernone">
                                        <thead>
                                            <tr>
                                                <th class="f-26">Best Seller</th>
                                                <th>Date</th>
                                                <th>Product</th>
                                                <th>Country</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0"><img class="img-fluid"
                                                                src="{{ asset('assets/images/dashboard-2/dash-2/01.png') }}"
                                                                alt=""></div>
                                                        <div class="flex-grow-1"><span class="f-14 f-w-600"> <a
                                                                    href="{{ route('user_profile') }}">Ossim keter</a></span>
                                                            <p class="mb-0">2022</p>
                                                        </div>
                                                        <div class="active-status active-online"></div>
                                                    </div>
                                                </td>
                                                <td>16 August</td>
                                                <td>Clothes</td>
                                                <td> <i class="flag-icon flag-icon-gb"></i></td>
                                                <td> <span>$1,58,652</span></td>
                                                <td> <span>Success</span><i class="fa fa-check-circle f-14"></i></td>
                                                <td><span> <a href="{{ route('edit_profile') }}">Edit</a></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center"><img class="img-fluid"
                                                            src="{{ asset('assets/images/dashboard-2/dash-2/02.png') }}"
                                                            alt="">
                                                        <div class="flex-grow-1"><span class="f-14 f-w-600"> <a
                                                                    href="{{ route('user_profile') }}">Venter loren</a></span>
                                                            <p class="mb-0">2021</p>
                                                        </div>
                                                        <div class="active-status active-online"></div>
                                                    </div>
                                                </td>
                                                <td>21 September</td>
                                                <td>Branded Shoes</td>
                                                <td> <i class="flag-icon flag-icon-us"></i></td>
                                                <td> <span>$95,025</span></td>
                                                <td> <span>Success</span><i class="fa fa-check-circle f-14"></i></td>
                                                <td> <span><a href="{{ route('edit_profile') }}">Edit</a></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center"><img class="img-fluid"
                                                            src="{{ asset('assets/images/dashboard-2/dash-2/03.png') }}"
                                                            alt="">
                                                        <div class="flex-grow-1"><span class="f-14 f-w-600"> <a
                                                                    href="{{ route('user_profile') }}">Fran Loain</a></span>
                                                            <p class="mb-0">2022</p>
                                                        </div>
                                                        <div class="active-status active-online"></div>
                                                    </div>
                                                </td>
                                                <td>06 March</td>
                                                <td>Electronics</td>
                                                <td> <i class="flag-icon flag-icon-za"></i></td>
                                                <td> <span>$90,155</span></td>
                                                <td> <span>Success</span><i class="fa fa-check-circle f-14"></i></td>
                                                <td> <span> <a href="{{ route('edit_profile') }}">Edit</a></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center"><img class="img-fluid"
                                                            src="{{ asset('assets/images/dashboard-2/dash-2/04.png') }}"
                                                            alt="">
                                                        <div class="flex-grow-1"><span class="f-14 f-w-600"> <a
                                                                    href="{{ route('user_profile') }}">Loften Horen</a></span>
                                                            <p class="mb-0">2021</p>
                                                        </div>
                                                        <div class="active-status active-online"></div>
                                                    </div>
                                                </td>
                                                <td>12 February</td>
                                                <td>Watch</td>
                                                <td> <i class="flag-icon flag-icon-at"></i></td>
                                                <td> <span>$80,658</span></td>
                                                <td> <span>Success</span><i class="fa fa-check-circle f-14"></i></td>
                                                <td> <span> <a href="{{ route('edit_profile') }}">Edit</a></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center"><img class="img-fluid"
                                                            src="{{ asset('assets/images/dashboard-2/dash-2/05.png') }}"
                                                            alt="">
                                                        <div class="flex-grow-1"><span class="f-14 f-w-600"> <a
                                                                    href="{{ route('user_profile') }}">Loie fenter</a></span>
                                                            <p class="mb-0">2022</p>
                                                        </div>
                                                        <div class="active-status active-online"></div>
                                                    </div>
                                                </td>
                                                <td>30 January</td>
                                                <td>Jewellery</td>
                                                <td> <i class="flag-icon flag-icon-br"></i></td>
                                                <td> <span>$50,652</span></td>
                                                <td> <span>Success</span><i class="fa fa-check-circle f-14"></i></td>
                                                <td> <span> <a href="{{ route('edit_profile') }}">Edit</a></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#sold-card"><i
                                            class="icofont icofont-copy-alt"></i></button>
                                    <pre><code class="language-html" id="sold-card">&lt;div class="card best-seller"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Our Total Sold
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
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
&lt;div class="card-body pt-0"&gt;
&lt;div class="table-responsive theme-scrollbar"&gt;
&lt;table class="table table-bordernone"&gt;
&lt;thead&gt;
  &lt;tr&gt;
    &lt;th class="f-26"&gt; Best Seller
    &lt;/th&gt;
    &lt;th&gt; Date &lt;/th&gt;
    &lt;th&gt; Product &lt;/th&gt;
    &lt;th&gt; Country &lt;/th&gt;
    &lt;th&gt; Total &lt;/th&gt;
    &lt;th&gt; Status &lt;/th&gt;
  &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;div class="flex-shrink-0"&gt;
          &lt;img class="img-fluid" src="../assets/images/dashboard-2/dash-2/01.png" alt=""/&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; 
            &lt;a href="user-profile.html"&gt; Ossim keter&lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 2022 &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; 16 August &lt;/td&gt;
    &lt;td&gt; Clothes &lt;/td&gt;
    &lt;td&gt;
      &lt;i class="flag-icon flag-icon-gb"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $1,58,652 &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Success &lt;/span&gt;
      &lt;i class="fa fa-check-circle f-14"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt;
        &lt;a href="edit-profile.html"&gt; Edit &lt;/a&gt;
      &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid" src="../assets/images/dashboard-2/dash-2/02.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; &lt;a href="user-profile.html"&gt;Venter loren&lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 2021 &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; 21 September &lt;/td&gt;
    &lt;td&gt; Branded Shoes &lt;/td&gt;
    &lt;td&gt;
      &lt;i class="flag-icon flag-icon-us"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $95,025 &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Success &lt;/span&gt;
      &lt;i class="fa fa-check-circle f-14"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt;
        &lt;a href="edit-profile.html"&gt; Edit &lt;/a&gt;
      &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid" src="../assets/images/dashboard-2/dash-2/03.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; &lt;a href="user-profile.html"&gt; Fran Loain &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 2022 &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; 06 March &lt;/td&gt;
    &lt;td&gt; Electronics &lt;/td&gt;
    &lt;td&gt;
      &lt;i class="flag-icon flag-icon-za"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $90,155 &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Success &lt;/span&gt;
      &lt;i class="fa fa-check-circle f-14"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt;
        &lt;a href="edit-profile.html"&gt; Edit &lt;/a&gt;
      &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid" src="../assets/images/dashboard-2/dash-2/04.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; &lt;a href="user-profile.html"&gt; Loften Horen &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 2021 &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; 12 February &lt;/td&gt;
    &lt;td&gt; Watch &lt;/td&gt;
    &lt;td&gt;
      &lt;i class="flag-icon flag-icon-at"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $80,658 &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Success &lt;/span&gt;
      &lt;i class="fa fa-check-circle f-14"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt;
        &lt;a href="edit-profile.html"&gt; Edit &lt;/a&gt;
      &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid" src="../assets/images/dashboard-2/dash-2/05.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; &lt;a href="user-profile.html"&gt;Loie fenter &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 2022 &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; 30 January &lt;/td&gt;
    &lt;td&gt; Jewellery &lt;/td&gt;
    &lt;td&gt;
      &lt;i class="flag-icon flag-icon-br"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $50,652 &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Success &lt;/span&gt;
      &lt;i class="fa fa-check-circle f-14"&gt;&lt;/i&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt;
        &lt;a href="edit-profile.html"&gt; Edit &lt;/a&gt;
      &lt;/span&gt;
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
                </div>
            </div>
            <div class="col-xl-3 col-lg-5 col-md-6 box-col-30 xl-30">
                <div class="card product">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Top Selling Product<i class="fa fa-circle"> </i></p>
                                <h4>Product</h4>
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
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/1.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a href="{{ route('product') }}">Nike
                                                            Shoes</a></span>
                                                    <p class="mb-0">451 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-05%</td>
                                        <td><span>$49.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/2.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a
                                                            href="{{ route('product') }}">Headphone</a></span>
                                                    <p class="mb-0">1657 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-20%</td>
                                        <td><span>$28.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/3.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a href="{{ route('product') }}">Tree Pot</a></span>
                                                    <p class="mb-0">32 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-12%</td>
                                        <td><span>$30.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/4.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a
                                                            href="{{ route('product') }}">Black Purse</a></span>
                                                    <p class="mb-0">663 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-16%</td>
                                        <td><span>$22.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/5.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a href="{{ route('product') }}">Ck Watch</a></span>
                                                    <p class="mb-0">4785 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-50%</td>
                                        <td><span>$48.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/6.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a href="{{ route('product') }}">New
                                                            T-shirt</a></span>
                                                    <p class="mb-0">9 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-20%</td>
                                        <td><span>$69.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/7.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a
                                                            href="{{ route('product') }}">Jewellery</a></span>
                                                    <p class="mb-0">7878 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-10%</td>
                                        <td><span>$78.00</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img class="img-fluid circle"
                                                    src="{{ asset('assets/images/dashboard-2/product/8.png') }}" alt="">
                                                <div class="flex-grow-1"><span> <a href="{{ route('product') }}">Smart
                                                            Phone</a></span>
                                                    <p class="mb-0">987 item</p>
                                                </div>
                                                <div class="active-status active-online"></div>
                                            </div>
                                        </td>
                                        <td>-30%</td>
                                        <td><span>$36.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#sell-product"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="sell-product">&lt;div class="card product"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Our Total Profit
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
&lt;h4&gt; Product&lt;/h4&gt;
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
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/1.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Nike Shoes &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 451 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -05% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $49.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/2.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Headphone &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 1657 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -20% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $28.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/3.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Tree Pot &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 32 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -12% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $30.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/4.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Black Purse &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 663 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -16% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $22.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/5.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Ck Watch &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 4785 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -50% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $48.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/6.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; New T-shirt &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 9 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -20% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $69.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/7.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Jewellery &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 7878 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -10% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $78.00 &lt;/span&gt;
    &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex align-items-center"&gt;
        &lt;img class="img-fluid circle" src="../assets/images/dashboard-2/product/7.png" alt=""/&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span&gt; &lt;a href="product.html"&gt; Smart Phone &lt;/a&gt; &lt;/span&gt;
          &lt;p class="mb-0"&gt; 987 item &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="active-status active-online"&gt;&lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt; -30% &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; $36.00 &lt;/span&gt;
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
            <div class="col-xl-4 col-lg-7 col-md-6 box-col-38 xl-38">
                <div class="card goal-view">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Our Goal Overview<i class="fa fa-circle"> </i></p>
                                <h4>Goal Overview</h4>
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
                        <div class="goal-chart">
                            <div class="shap-block">
                                <div class="rounded-shap animate-bg-secondary"><i></i><i></i><i></i></div>
                            </div>
                            <div id="goal"></div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#goal-overview"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="goal-overview">&lt;div class="card goal-view"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Our Goal Overview
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
&lt;h4&gt; Goal Overview&lt;/h4&gt;
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
&lt;div class="goal-chart"&gt;
&lt;div class="shape-block"&gt;
&lt;div class="rounded-shap animate-bg-secondary"&gt;
  &lt;i&gt;&lt;/i&gt;
  &lt;i&gt;&lt;/i&gt;
  &lt;i&gt;&lt;/i&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div id="goal"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;ul&gt;
&lt;li&gt;
&lt;h4 class="f-w-700"&gt; $8,54,159 &lt;/h4&gt;
&lt;span class="f-w-500"&gt; Completed &lt;/span&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;h4 class="f-w-700"&gt; $9,85,000 &lt;/h4&gt;
&lt;span class="f-w-500"&gt; Our Goal &lt;/span&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;h4 class="f-w-700"&gt; $66,264 &lt;/h4&gt;
&lt;span class="f-w-500"&gt; In Progress &lt;/span&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                    <div class="card-footer">
                        <ul>
                            <li>
                                <h4 class="f-w-700">$8,54,159</h4><span class="f-w-500">Completed</span>
                            </li>
                            <li>
                                <h4 class="f-w-700">$9,85,000</h4><span class="f-w-500">Our Goal</span>
                            </li>
                            <li>
                                <h4 class="f-w-700">$66,264</h4><span class="f-w-500">In Progress</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 box-col-33">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Recent Activity<i class="fa fa-circle"> </i></p>
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
                            <div class="d-flex align-items-start">
                                <div class="activity-line"></div>
                                <div class="activity-dot-secondary"></div>
                                <div class="flex-grow-1">
                                    <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today</p><span
                                        class="f-w-700">Updated Product</span>
                                    <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt enim.</p>
                                </div><i class="fa fa-circle circle-dot-secondary pull-right"></i>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="activity-dot-primary"></div>
                                <div class="flex-grow-1">
                                    <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today<span
                                            class="badge badge-primary ms-2">New</span></p><span class="f-w-700">James
                                        just like your product</span>
                                    <p>Quisque a consequat ante Sit amet magna at volutapt enim.</p>
                                    <ul class="img-wrapper">
                                        <li> <img class="img-fluid" src="{{ ('../assets/images/dashboard-2/product/shoes1.png') }}"
                                                alt=""></li>
                                        <li><img class="img-fluid" src="{{ ('../assets/images/dashboard-2/product/shoes2.png') }}"
                                                alt=""></li>
                                    </ul>
                                </div><i class="fa fa-circle circle-dot-primary pull-right"></i>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="activity-dot-secondary"></div>
                                <div class="flex-grow-1">
                                    <p class="mt-0 todo-font"><span class="font-primary">20-04-2022 </span>Today</p><span
                                        class="f-w-700">Jihan Doe just like your product</span>
                                    <p class="mb-0">Vestibulum nec mi suscipit, dapibus purus a consequat ane.</p>
                                </div><i class="fa fa-circle circle-dot-secondary pull-right"></i>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#activity1"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="activity1">&lt;div class="card"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Recent Activity
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
&lt;div class="card-body"&gt;
&lt;div class="activity-timeline"&gt;
&lt;div class="d-flex align-items-start"&gt;
&lt;div class="activity-line"&gt;&lt;/div&gt;
&lt;div class="activity-dot-secondary"&gt;&lt;/div&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="todo-font mt-0"&gt; Today
    &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
  &lt;/p &gt;
  &lt;span class="f-w-700" Updated Product
  &lt;p class="mb-0"&gt; Quisque a consequat ante Sit amet magna at volutapt enim. &lt;/p&gt;
&lt;/div&gt;
&lt;i class="fa fa-circle circle-dot-secondary pull-right"&gt;&lt;/i&gt;
&lt;/div&gt;
&lt;div class="d-flex align-items-start"&gt;
&lt;div class="activity-dot-primary"&gt;&lt;/div&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="todo-font mt-0"&gt;
    &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
    Today
    &lt;span class="badge badge-primary ms-2"&gt; New &lt;/span&gt;
  &lt;/p &gt;
  &lt;span class="f-w-700"&gt; James just like your product &lt;/span&gt;
  &lt;p&gt; Quisque a consequat ante Sit amet magna at volutapt enim. &lt;/p&gt;
  &lt;ul&gt;
    &lt;li&gt;
      &lt;img class="img-fluid" src="../assets/images/dashboard-2/product/shoes1.png" alt=""/&gt;
    &lt;/li&gt;
    &lt;li&gt;
      &lt;img class="img-fluid" src="../assets/images/dashboard-2/product/shoes2.png" alt=""/&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
  &lt;i class="fa fa-circle circle-dot-secondary pull-right"&gt;&lt;/i&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="d-flex align-items-start"&gt;
&lt;div class="activity-dot-secondary"&gt;&lt;/div&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;p class="mt-0 todo-font"&gt;
    &lt;span class="font-primary"&gt; 20-04-2022 &lt;/span&gt;
    Today
  &lt;/p &gt;
  &lt;span class="f-w-700"&gt; Jihan Doe just like your product
  &lt;/span&gt;
  &lt;p class="mb-0"&gt; Vestibulum nec mi suscipit, dapibus purus a consequat ane. &lt;/p&gt;
&lt;/div&gt;
&lt;i class="fa fa-circle circle-dot-secondary pull-right"&gt;&lt;/i&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt; </code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 box-col-28 xl-28">
                <div class="card static-card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Order Statics<i class="fa fa-circle"> </i></p>
                                <h4>6,65,484 Order</h4>
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
                    <div class="card-body pb-0 pt-0">
                        <div class="order-static">
                            <div id="order-chart"></div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#order-static"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="order-static">&lt;div class="card static-card"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Order Statics
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
&lt;h4&gt; 6,65,484 Order&lt;/h4&gt;
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
&lt;div class="card-body pb-0 pt-0"&gt;
&lt;div class="order-static"&gt;
&lt;div id="order-chart"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;ul class="d-xxl-flex d-block order-bottom"&gt;
&lt;li class="d-flex"&gt;
&lt;div class="flex-shrink-0"&gt;
  &lt;div&gt;
    &lt;i class="fa fa-arrow-up"&gt;&lt;/i&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;h6&gt; 4,84,315 order&lt;/h6&gt;
  &lt;p class="f-w-500"&gt; Last two month order...... &lt;/p&gt;
&lt;/div&gt;
&lt;/li&gt;
&lt;li class="d-flex"&gt;
&lt;div class="flex-shrink-0"&gt;
  &lt;div&gt;
    &lt;i class="fa fa-arrow-up"&gt;&lt;/i&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex-grow-1"&gt;
  &lt;h6&gt; 6,65,484 order&lt;/h6&gt;
  &lt;p class="f-w-500"&gt; Last two Days order........ &lt;/p&gt;
&lt;/div&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                    <div class="card-footer">
                        <ul class="d-xxl-flex d-block order-bottom">
                            <li class="d-flex">
                                <div class="flex-shrink-0">
                                    <div><i class="fa fa-arrow-up"></i></div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6>4,84,315 order</h6>
                                    <p class="f-w-500">Last two month order......</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="flex-shrink-0">
                                    <div><i class="fa fa-arrow-up"></i></div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6>6,65,484 order</h6>
                                    <p class="f-w-500">Last two Days order........</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 box-col-40">
                <div class="card product-slider">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Latest Offer Product<i class="fa fa-circle"> </i></p>
                                <h4>-60% Offer</h4>
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
                        <div class="owl-carousel owl-theme" id="owl-carousel-1">
                            <div class="item"><img class="img-fluid" src="{{ ('../assets/images/dashboard-2/1.png') }}"
                                    alt="">
                                <div class="product-content">
                                    <div class="badge badge-primary">New</div>
                                    <h4> <a href="{{ route('product') }}">Black Apple Airpod</a><i class="fa fa-check-circle"></i>
                                    </h4>
                                    <h5 class="f-16">$120.00</h5>
                                </div>
                            </div>
                            <div class="item"><img class="img-fluid" src="{{ ('../assets/images/dashboard-2/2.png') }}"
                                    alt="">
                                <div class="product-content">
                                    <div class="badge badge-primary">New</div>
                                    <h4> <a href="{{ route('product') }}">Red Hova Sport Shoes</a><i class="fa fa-check-circle"></i>
                                    </h4>
                                    <h5 class="f-16">$120.00</h5>
                                </div>
                            </div>
                            <div class="item"><img class="img-fluid" src="{{ ('../assets/images/dashboard-2/3.png') }}"
                                    alt="">
                                <div class="product-content">
                                    <div class="badge badge-primary">New</div>
                                    <h4> <a href="{{ route('product') }}">Blue Mens Watch</a><i class="fa fa-check-circle"></i></h4>
                                    <h5 class="f-16">$120.00</h5>
                                </div>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#product"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="product">&lt;div class="card product-slider"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Latest Offer Product
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
&lt;h4&gt; -60% Offer&lt;/h4&gt;
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
&lt;div class="owl-carousel owl-theme" id="owl-carousel-1&gt;
&lt;div class="item"&gt;
&lt;img class="img-fluid" src="../assets/images/dashboard-2/1.png" alt=""/&gt;
 &lt;div class="product-content "&gt;
    &lt;div class="badge badge-primary"&gt; New &lt;/div&gt;
    &lt;h4&gt; &lt;a href="product.html"&gt; Black Apple Airpod &lt;/a&gt;
      &lt;i class="fa fa-check-circle"&gt;&lt;/i&gt;
    &lt;/h4&gt;
    &lt;h5 class="f-16"&gt; $120.00 &lt;/h5&gt;
 &lt;/div&gt;
&lt;/div&gt;
&lt;div class="item"&gt;
&lt;img class="img-fluid" src="../assets/images/dashboard-2/2.png" alt=""/&gt;
 &lt;div class="product-content "&gt;
    &lt;div class="badge badge-primary"&gt; New &lt;/div&gt;
    &lt;h4&gt;&lt;a href="product.html"&gt; Red Hova Sport Shoes &lt;/a&gt;
      &lt;i class="fa fa-check-circle"&gt;&lt;/i&gt;
    &lt;/h4&gt;
    &lt;h5 class="f-16"&gt; $120.00 &lt;/h5&gt;
 &lt;/div&gt;
&lt;/div&gt;
&lt;div class="item"&gt;
&lt;img class="img-fluid" src="../assets/images/dashboard-2/3.png" alt=""/&gt;
 &lt;div class="product-content "&gt;
    &lt;div class="badge badge-primary"&gt; New &lt;/div&gt;
    &lt;h4&gt; &lt;a href="product.html"&gt; Blue Mens Watch &lt;/a&gt;
      &lt;i class="fa fa-check-circle"&gt;&lt;/i&gt;
    &lt;/h4&gt;
    &lt;h5 class="f-16"&gt; $120.00 &lt;/h5&gt;
 &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-12 box-col-7">
                <div class="card order-card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="square-after f-w-600">Our Total Sold<i class="fa fa-circle"></i></p>
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
                    <div class="card-body pt-0">
                        <div class="table-responsive theme-scrollbar">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th class="f-26">Order List</th>
                                        <th>Status</th>
                                        <th>Operator</th>
                                        <th>Delivery Date</th>
                                        <th>Delivery Address</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="number-dot"><span class="f-w-700">1</span></div>
                                                <div class="flex-grow-1"><span class="f-14 f-w-600">#456861</span></div>
                                            </div>
                                        </td>
                                        <td> <span>Moving</span></td>
                                        <td>Ossim keter</td>
                                        <td>16 August</td>
                                        <td>Green Bay, Wisconsin, London</td>
                                        <td>$450.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="number-dot"><span class="f-w-700">2</span></div>
                                                <div class="flex-grow-1"><span class="f-14 f-w-600">#846953</span></div>
                                            </div>
                                        </td>
                                        <td> <span>Moving</span></td>
                                        <td>Venter loren</td>
                                        <td>21 September</td>
                                        <td>Summerlin, Nevada, United kingdom</td>
                                        <td>$136.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="number-dot"><span class="f-w-700">3</span></div>
                                                <div class="flex-grow-1"><span class="f-14 f-w-600">#197568</span></div>
                                            </div>
                                        </td>
                                        <td> <span>Cancel</span></td>
                                        <td>Fran loain</td>
                                        <td>06 March</td>
                                        <td>Atlantic City, New Jersey, UK</td>
                                        <td>$624.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="number-dot"><span class="f-w-700">4</span></div>
                                                <div class="flex-grow-1"><span class="f-14 f-w-600">#647953</span></div>
                                            </div>
                                        </td>
                                        <td> <span>Pending</span></td>
                                        <td>Loften Horen</td>
                                        <td>12 February</td>
                                        <td>Fort Worth, Soun Di, Texas, USA</td>
                                        <td>$48.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="number-dot"><span class="f-w-700">5</span></div>
                                                <div class="flex-grow-1"><span class="f-14 f-w-600">#447495</span></div>
                                            </div>
                                        </td>
                                        <td> <span>Moving</span></td>
                                        <td>Loie fenter</td>
                                        <td>12 February</td>
                                        <td>Green Bay, Wisconsin, London</td>
                                        <td>$258.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#total-sold"><i
                                    class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="total-sold">&lt;div class="card order-card"&gt;
&lt;div class="card-header pb-0"&gt;
&lt;div class="d-flex justify-content-between"&gt;
&lt;div class="flex-grow-1"&gt;
&lt;p class="square-after f-w-600"&gt; Our Total Sold
  &lt;i class="fa fa-circle"&gt;&lt;/i&gt;
&lt;/p&gt;
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
&lt;div class="card-body pt-0"&gt;
&lt;div class="table-responsive theme-scrollbar"&gt;
&lt;table class="table table-bordernone"&gt;
&lt;thead&gt;
  &lt;tr&gt;
    &lt;th class="f-26"&gt; Order List
    &lt;/th&gt;
    &lt;th&gt; Status &lt;/th&gt;
    &lt;th&gt; Operator &lt;/th&gt;
    &lt;th&gt; Delivery Date &lt;/th&gt;
    &lt;th&gt; Delivery Address &lt;/th&gt;
    &lt;th&gt; &lt;/th&gt;
  &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex"&gt;
        &lt;div class="number-dot"&gt;
          &lt;span class="f-w-700"&gt; 1 &lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; #456861 &lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Moving &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt; Ossim keter &lt;/td&gt;
    &lt;td&gt; 16 August &lt;/td&gt;
    &lt;td&gt; Green Bay, Wisconsin, London &lt;/td&gt;
    &lt;td&gt; $450.00 &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex"&gt;
        &lt;div class="number-dot"&gt;
          &lt;span class="f-w-700"&gt; 2 &lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; #846953 &lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Moving &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt; Venter loren &lt;/td&gt;
    &lt;td&gt; 21 September &lt;/td&gt;
    &lt;td&gt; Summerlin, Nevada, United kingdom &lt;/td&gt;
    &lt;td&gt; $136.00 &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex"&gt;
        &lt;div class="number-dot"&gt;
          &lt;span class="f-w-700"&gt; 3 &lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; #197568 &lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Cancel &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt; Fran loain &lt;/td&gt;
    &lt;td&gt; 06 March &lt;/td&gt;
    &lt;td&gt; Atlantic City, New Jersey, UK &lt;/td&gt;
    &lt;td&gt; $624.00 &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex"&gt;
        &lt;div class="number-dot"&gt;
          &lt;span class="f-w-700"&gt; 4 &lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; #647953 &lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Pending &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt; Loften Horen &lt;/td&gt;
    &lt;td&gt; 12 February &lt;/td&gt;
    &lt;td&gt; Fort Worth, Soun Di, Texas, USA &lt;/td&gt;
    &lt;td&gt; $48.00 &lt;/td&gt;
  &lt;/tr&gt;
  &lt;tr&gt;
    &lt;td&gt;
      &lt;div class="d-flex"&gt;
        &lt;div class="number-dot"&gt;
          &lt;span class="f-w-700"&gt; 5 &lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="flex-grow-1"&gt;
          &lt;span class="f-14 f-w-600"&gt; #447495 &lt;/span&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/td&gt;
    &lt;td&gt;
      &lt;span&gt; Moving &lt;/span&gt;
    &lt;/td&gt;
    &lt;td&gt; Loie fenter &lt;/td&gt;
    &lt;td&gt; 12 February &lt;/td&gt;
    &lt;td&gt; Green Bay, Wisconsin, London &lt;/td&gt;
    &lt;td&gt; $258.00 &lt;/td&gt;
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
    <script>
        localStorage.clear();
        localStorage.setItem('body-wrapper', '');
    </script>
@endsection
