@extends('layouts.master')

@section('title', '403 Error')

@section('content')

        <div class="error-container">
          <div class="col-xs-12">
            <div class="content">
                  <div class="title">4</div>
                  <img src="/img/icon-hub-medium.png">
                  <div class="title">3</div>
                  <div class ="error">Access forbidden</div>
                  <p>Sorry, but you are not authorised to access this page.</p>
                  <a href ="/"><button id="back">{{ trans('navigation.title') }}</button</a>
            </div>
          </div>
        </div>
	@endsection
