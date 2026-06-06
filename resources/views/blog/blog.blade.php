@extends('layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Blog Details</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Blog</li>
            <li class="breadcrumb-item active">Blog Details</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid blog-page">
    <div class="row">
      <div class="col-xxl-6 box-col-50 xl-40">
        <div class="card">
          <div class="blog-box blog-shadow"><img class="img-fluid bg-img-cover" src="{{ asset('assets/images/blog/blog.jpg') }}" alt="">
            <div class="blog-details">
              <p>04 August 2023</p>
              <h4>People just don't do it anymore. We have to change that. Sometimes the simplest things are the most profound.</h4>
              <ul class="blog-social">
                <li><i class="icofont icofont-user"></i>Mark Jecno</li>
                <li><i class="icofont icofont-thumbs-up"></i>02 Hits</li>
                <li><i class="icofont icofont-ui-chat"></i>598 Comments</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-6 box-col-50 xl-60">
        <div class="row">
          <div class="col-xl-12 col-md-6">
            <div class="card">
              <div class="blog-box blog-list row">
                <div class="col-xl-6 col-12">
                  <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid sm-100-wp p-0" src="{{ asset('assets/images/blog/blog-2.jpg') }}" alt=""></a></div>
                </div>
                <div class="col-xl-6 col-12">
                  <div class="blog-details">
                    <div class="blog-date"><span>02</span> January 2023</div><a href="{{ route('learning_detailed') }}">
                      <h6>Encounter every day.</h6></a>
                    <div class="blog-bottom-content">
                      <ul class="blog-social">
                        <li>by: Admin</li>
                        <li>12 Hits</li>
                      </ul>
                      <hr>
                      <p class="mt-0">A huge part of it is the incomparable beauty you can encounter every day.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-md-6">
            <div class="card">
              <div class="blog-box blog-list row">
                <div class="col-xl-6 col-12">
                  <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid sm-100-w p-0" src="{{ asset('assets/images/blog/blog-3.jpg') }}" alt=""></a></div>
                </div>
                <div class="col-xl-6 col-12">
                  <div class="blog-details">
                    <div class="blog-date"><span>03</span> January 2023</div><a href="{{ route('learning_detailed') }}">
                      <h6>White color is important.</h6></a>
                    <div class="blog-bottom-content">
                      <ul class="blog-social">
                        <li>by: Admin</li>
                        <li>5 Hits</li>
                      </ul>
                      <hr>
                      <p class="mt-0">The simplest things are the most profound. People just don't do it anymore.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 box-col-3">
        <div class="card">
          <div class="blog-box blog-grid">
            <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid top-radius-blog" src="{{ asset('assets/images/blog/blog-5.jpg') }}" alt=""></a></div>
            <div class="blog-details-second">
              <div class="blog-post-date"><span class="blg-month">apr</span><span class="blg-date">10</span></div><a href="{{ route('blog_single') }}">
                <h6 class="blog-bottom-details">Black color is important.</h6></a>
              <p>A huge part of it is the incomparable beauty you can encounter every day.People just anymore profound.</p>
              <div class="detail-footer"> 
                <ul class="sociyal-list">
                  <li><i class="fa fa-user-o"></i>admin</li>
                  <li><i class="fa fa-comments-o"></i>5</li>
                  <li><i class="fa fa-thumbs-o-up"></i>2 like</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 box-col-3">
        <div class="card">
          <div class="blog-box blog-grid">
            <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid top-radius-blog" src="{{ asset('assets/images/blog/blog-6.jpg') }}" alt=""></a></div>
            <div class="blog-details-second">
              <div class="blog-post-date"><span class="blg-month">apr</span><span class="blg-date">10</span></div><a href="{{ route('blog_single') }}">
                <h6 class="blog-bottom-details">Men's Jacket</h6></a>
              <p>People just don't do it anymore. We have to change that. Sometimes the simplest things are the most profound.</p>
              <div class="detail-footer"> 
                <ul class="sociyal-list">
                  <li><i class="fa fa-user-o"></i>admin</li>
                  <li><i class="fa fa-comments-o"></i>5</li>
                  <li><i class="fa fa-thumbs-o-up"></i>2 like</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 box-col-3">
        <div class="card">
          <div class="blog-box blog-grid">
            <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid top-radius-blog" src="{{ asset('assets/images/blog/blog-5.jpg') }}" alt=""></a></div>
            <div class="blog-details-second">
              <div class="blog-post-date"><span class="blg-month">apr</span><span class="blg-date">10</span></div><a href="{{ route('blog_single') }}">
                <h6 class="blog-bottom-details">Black color is important.</h6></a>
              <p>A huge part of it is the incomparable beauty you can encounter every day.People just anymore profound.</p>
              <div class="detail-footer"> 
                <ul class="sociyal-list">
                  <li><i class="fa fa-user-o"></i>admin</li>
                  <li><i class="fa fa-comments-o"></i>5</li>
                  <li><i class="fa fa-thumbs-o-up"></i>2 like</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 box-col-3">
        <div class="card">
          <div class="blog-box blog-grid">
            <div class="blog-wrraper"><a href="{{ route('blog_single') }}"><img class="img-fluid top-radius-blog" src="{{ asset('assets/images/blog/blog-6.jpg') }}" alt=""></a></div>
            <div class="blog-details-second">
              <div class="blog-post-date"><span class="blg-month">apr</span><span class="blg-date">10</span></div><a href="{{ route('blog_single') }}">
                <h6 class="blog-bottom-details">Men's Jacket</h6></a>
              <p>People just don't do it anymore. We have to change that. Sometimes the simplest things are the most profound.</p>
              <div class="detail-footer"> 
                <ul class="sociyal-list">
                  <li><i class="fa fa-user-o"></i>admin</li>
                  <li><i class="fa fa-comments-o"></i>5</li>
                  <li><i class="fa fa-thumbs-o-up"></i>2 like</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection