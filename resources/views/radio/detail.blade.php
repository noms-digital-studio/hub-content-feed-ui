@extends('layouts.master')

@section('title', 'Radio')

@section('header')

<div class="header-nav-wrap radio-header" style="background-image: url({{ $radioShow->parent->channel_banner}})">
	<div class="container" id="header">
		<div class="row">
			<div class="col-xs-12">
				<a href="/" class="back-to-hub">
					<span class="icon icon-icon-back-white" id="return-to-the-hub-arrow" aria-hidden="true"></span>
					<div class="return-to-the-hub-text white">
						{{ trans('navigation.title') }}
					</div>
				</a>
				<h2 class="radio-title">
					<a href="{{ action('RadiosController@showRadioLandingPage') }}">
						<span class="icon icon-icon-radio" aria-hidden="true"></span>
						{{ trans('navigation.radio') }}
					</a>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>{{ $radioShow->parent->channel_name }}</h1>
				{!! $radioShow->parent->channel_description !!}
			</div>
		</div>
	</div>

	<audio id="radio-player" class="video-js">
		<source src="{{ $radioShow->episode->radio_show_url}}" type="audio/mp3" />
	</audio>

	<a href="#" id="play-prev-show"><span class="icon icon-prev-small">{{ trans('radio.previousshow') }}</span></a>
	<a href="#" id="play-next-show"><span class="icon icon-next-small">{{ trans('radio.nextshow') }}</span></a>

	<div id="equaliser"></div>
</div>

@endsection

@section('content')

<div class="container education-container radio-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<h2>{{ trans('radio.episodestitle') }}</h2>
			<ul>
			@foreach($shows as $show)
				<li>
					<a href="#" data-audio-src="{{ $show->radio_show_url }}" class="play-radio-show" id="show-{{ $show->nid }}">
						<span class="icon icon-play-button play-show-button">{{ trans('radio.playshow') }}</span>
						{{ $show->title }}: {{ date('j/m/Y', $show->date) }}
						<div class="duration">
							@if($show->duration)
								<span class="icon icon-clock play-show-icon-clock" aria-hidden="true"></span>
								{{ $show->duration }}
							@endif()
						</div>
						@if($show->added_today)
						<div class="added-today">
								{{ trans('radio.addedtoday') }}
						</div>
						@endif()
					</a>
				</li>
			@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
