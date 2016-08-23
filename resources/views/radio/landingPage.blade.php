@extends('layouts.master'   )

@section('title', 'Radio')

@section('header')

<div class="header-nav-wrap light-blue">
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
              <img src="/img/icon-radio.png" id="page-icon">
              Radio
            </a>
        </h2>
      </div>
    </div>
    <div class="radio-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="radio-description">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')




@endsection
