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
	<a href="#" id="play-prev-show">PREV</a>
	<a href="#" id="play-next-show">NEXT</a>
	<div id="equaliser"></div>
</div>

@endsection

@section('content')

<div class="container education-container radio-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<ul>
			@foreach($shows as $show)
				<li>
					<a href="#" data-audio-src="{{ $show->radio_show_url }}" class="play-radio-show" id="show-{{ $show->nid }}">
						<span class="icon icon-play-button"></span>
						{{ $show->title }}: {{ date('l jS F', $show->date) }} {{ $show->duration }}
						@if($show->added_today)
						(Added today)
						@endif()
					</a>
				</li>
			@endforeach
			</ul>

		</div>
	</div>
</div>

@endsection
