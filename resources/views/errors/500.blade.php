@extends('layouts.master')

@section('title', '500 Error')

@section('content')

<div class="error-container">
  <div class="col-xs-12">
    <div class="content">
      <div class="title">5</div>
      <img src="/img/icon-hub-medium.png">
      <div class="title">0</div>
      <div class ="error">{{ trans('error.500-title') }}</div>
      <p>{{ trans('error.500-message') }}</p>
      <a href="/" id="back">{{ trans('error.500-button') }}n</a>
    </div>
  </div>
</div>

@endsection
