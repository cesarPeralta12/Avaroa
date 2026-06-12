@extends('others.others_layout.master')
@section('title')
{{ $statusCode }} - Error
@endsection
@section('others_content')
<div class="error-wrapper">
    <div class="container">
        <h3>{{ $statusCode }} - Something went wrong</h3>
        <p>Please contact support or try again later.</p>
        <a class="btn btn-primary" href="{{ route('dashboard') }}">BACK TO HOME PAGE</a>
    </div>
</div>
@endsection
