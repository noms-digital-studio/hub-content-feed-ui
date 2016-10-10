@extends('layouts.master')

@section('title', $video->getTitle())

@section('header')

<div class="header-nav-wrap blue">
  <div class="container" id="header">
    <div class="row">
      <div class="col-xs-12">
        <a href="/" class="back-to-hub">
          <span class="icon icon-icon-back-white" aria-hidden="true"></span>
          <div class="back-to-the-hub-text white">
            {{ trans('navigation.title') }}
          </div>
        </a>
        <h2 class="page-title white">
            <a href="{{ action('VideosController@showVideoLandingPage') }}">
              <span class="icon icon-icon-video" aria-hidden="true"></span>
              Video
            </a>
        </h2>
      </div>
    </div>
  </div>
</div>

@endsection

@section('top_content')

<div class="video-player-wrap dark">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <video id="video_player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="600" height="240" data-setup='{}' controls poster="{{$video->getThumbnail()}}">
          <source src="{{ $video->getUrl() }}">
          <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
      </div>

      <div class="col-md-4 video-details">
        <span class="video-programme">{{ $video->getCategories()->name }}</span>

        <h2 class="video-title">{{ $video->getTitle() }}</h2>

        <div class="video-description">{!! $video->getDescription() !!}</div>

        @if($video->getDuration())
          <div class="video-duration">{{ $video->getDuration() }}</div>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="episodes-menu">
    @if(  count($categoryEpisodes) > 1 )
      <a href="#" id="EpisodeLink" class="active">{{ trans('video.episodes') }}</a>
    @endif
      <a href="#" id="AboutLink" class="{{count($categoryEpisodes) > 1 ? '' : 'active'}}">{{ trans('video.about') }}</a>
    </div>
  </div>
</div>


@if(  count($categoryEpisodes) > 1 )
<!-- Lists the episodes of the programme -->
<div id="EpisodeInfo">
  <div class="row">
    <div class="col-xs-12">
      <div class="channel-programmes channel-episodes">
        @foreach($categoryEpisodes as $episode)
          @include('video.episodeCard', ['episode' => $episode])
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif

<!-- Information about the programme-->
<div id="AboutInfo">
  <div class="row">
    <div class="col-xs-12">
      <div class="channel-programmes channel-episodes">
        <div>{!! $video->getCategories()->description !!}</div>
      </div>
    </div>
  </div>
</div>

@endsection
