@extends('layouts.master'   )

@section('title', 'Radios')

@section('header')

<div class="header-nav-wrap blue">
  <div class="container" id="header">
    <div class="row">
      <div class="col-xs-12">
        <a href="/">
          <img src="/img/icon-back-white.png" id="return-to-the-hub-arrow">
            <div class="return-to-the-hub-text white">
              {{ trans('navigation.title') }}
            </div>
        </a>
        <h2 class="page-title white">
            <a href="{{ action('RadiosController@showRadioLandingPage') }}">
              <img src="/img/icon-video.png" id="page-icon">
              Radio
            </a>
        </h2>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')



@endsection
