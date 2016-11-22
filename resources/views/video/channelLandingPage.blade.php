@extends('layouts.master'   )

@section('title', 'Video')

@section('header')

@include('stickyNavigation', ['title' => trans('navigation.video'), 'icon' => 'icon-icon-video', 'titleLink' => action('VideosController@showVideoLandingPage'), 'colour' => 'red' ])



<div class="video-player-wrap dark">
	<a href="{{ action('VideosController@showVideoLandingPage') }}" id="back-to-landing"><span class="arrow" aria-hidden="true"></span>{{ trans('video.back') }}</a>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<video id="video_player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{}' controls poster="">
					<source src="">
					<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
				</video>
			</div>

			<div class="col-md-7 video-details" id="textColSize">
				<span class="video-programme"></span>
				<h2 class="video-title">{{ $data->title }}</h2>
				<p>{!! $data->description !!}</p>				
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="episodes-menu">			
			<a href="#" id="EpisodeLink" class="active">{{ trans('video.courses') }}</a>						
			<a href="#" id="AboutLink" class="">{{ trans('video.moreInfo') }}</a>			
		</div>
	</div>
</div>

<!-- Lists the episodes of the programme -->
<div id="EpisodeInfo">
	<div class="row">
		<div class="col-xs-12">
			@if($data->programmes != null)
				<div class="channel-programmes channel-episodes">
					@foreach($data->programmes as $programme)
					@include('video.programmeCard', ['programme' => $programme])
					@endforeach
				</div>
			@endif
		</div>
	</div>
</div>

<!-- Information about the programme-->
<div id="AboutInfo">
	<div class="row">
		<div class="col-xs-9 col-centered">
			<div class="channel-programmes channel-episodes">
				MORE INFO
			</div>
		</div>
	</div>
</div>

@endsection
