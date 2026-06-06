@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Owl Carousel</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bonus Ui</li>
            <li class="breadcrumb-item active">Owl Carousel</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid owl-carouselpage">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Basic Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-1">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Responsive Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-2">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Center Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-3">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Merge Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-4">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Auto Width Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-5">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/11.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/12.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/13.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/14.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/15.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/11.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/12.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/13.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/14.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider-auto-width/15.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>URL Hash Navigations</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-6">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Events</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-7">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Stage Padding Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-8">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Right to Left Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-9">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Lazy load Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-10">
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/1.jpg') }}" data-src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/2.jpg') }}" data-src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/3.jpg') }}" data-src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/4.jpg') }}" data-src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/5.jpg') }}" data-src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/6.jpg') }}" data-src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/7.jpg') }}" data-src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/8.jpg') }}" data-src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/9.jpg') }}" data-src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/10.jpg') }}" data-src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img class="owl-lazy" src="{{ asset('assets/images/slider/11.jpg') }}" data-src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Animate Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-12">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Auto Play Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-13">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Auto Height Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-14">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h4>Mouse Wheel Example</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-15">
              <div class="item"><img src="{{ asset('assets/images/slider/1.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/2.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/3.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/4.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/5.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/6.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/7.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/8.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/9.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/10.jpg') }}" alt=""></div>
              <div class="item"><img src="{{ asset('assets/images/slider/11.jpg') }}" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

@section('scripts')
<script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/owlcarousel/owl-custom.js') }}"></script>    
@endsection




