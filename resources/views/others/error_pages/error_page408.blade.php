@extends('others.others_layout.master')
@section('title')
408 - Request Timeout
@endsection
@section('others_content')
<div class="error-wrapper">
    <div class="container">
      <div class="svg-wrraper">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="150" height="150" role="img" aria-label="408 - Request Timeout">
            <circle cx="256" cy="256" r="256" fill="#e0f7fa"/>
            <path fill="#26c6da" d="M256 128a128 128 0 1 0 128 128A128.14 128.14 0 0 0 256 128zm0 224a96 96 0 1 1 96-96 96.11 96.11 0 0 1-96 96z"/>
            <text x="256" y="290" text-anchor="middle" font-family="Arial, sans-serif" font-size="120" fill="#ffffff">408</text>
        </svg>

      </div>
      <div class="col-md-8 offset-md-2">
        <h3>408 - Request Timeout</h3>
        <p class="sub-content">The server timed out waiting for the request. Please try again later.</p><a class="btn btn-primary" href="{{ route('dashboard') }}">BACK TO HOME PAGE</a>
      </div>
    </div>
  </div>
@endsection
