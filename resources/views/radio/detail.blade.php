@extends('layouts.master'   )

@section('title', 'Radio')

@section('header')

<div class="header-nav-wrap radio-header" style="background: url({{ $radioShow->parent->channel_banner}}) no-repeat 50%">
	<div class="container" id="header">
		<div class="row">
			<div class="col-xs-12">
				<a href="/"  class="back-to-hub">
					<img src="/img/icon-back-white.png" id="radio-return-to-the-hub-arrow">
					{{ trans('navigation.title') }}
				</a>	
				<h2 class="page-title white">
					<a href="{{ action('RadiosController@showRadioLandingPage') }}">
						<img src="/img/icon-video.png" id="page-icon">
						Radio
					</a>
				</h2>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h1>{{ $radioShow->parent->channel_name }}</h1>
					<p>{!! $radioShow->parent->channel_description !!}</p>										
				</div>
			</div>
		</div>
	</div>
	<audio id="radio-player" class="video-js">
		<source src="{{ $radioShow->episode->radio_show_url}}" type="audio/mp3" />
	</audio>	
	<div id="equaliser"></div>
</div>

@endsection

@section('content')

@endsection
