@extends('layouts.master')

@section('title', '500 Error')

@section('content')

        <div class="error-container">
          <div class="col-xs-12">
            <div class="content">
                  <div class="title">5</div>
                  <img src="/img/icon-hub-medium.png">
                  <div class="title">0</div>
                  <div class ="error">Server error</div>
                  <p>Sorry, something went wrong. Please try back later.</p>
                  <a href ="/"><button id="back">{{ trans('navigation.title') }}</button</a>
            </div>
          </div>
        </div>
	@endsection
