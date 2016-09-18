@extends('layouts.master'   )

@section('title', 'Videos')

@section('header')

<div class="header-nav-wrap red">
  <div class="container" id="header">
    <div class="row">
      <div class="col-xs-12">
        <a href="/" class="back-to-hub">
          <span class="icon icon-icon-back-white" id="return-to-the-hub-arrow" aria-hidden="true"></span>
          <div class="return-to-the-hub-text white">
            {{ trans('navigation.title') }}
          </div>
        </a>
        <h2 class="page-title white">
            <a href="{{ action('VideosController@showVideoLandingPage') }}">
              <span class="icon icon-icon-video" aria-hidden="true"></span>
              {{ trans('video.title') }}
            </a>
        </h2>
      </div>
    </div>
  </div>
</div>

@endsection

@section('top_content')
<div class="recent-video-wrap dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        @include('video.recentVideo', ['recentVideos' => $recentVideos])
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')

@foreach($videos as $channel)
  <div class="channel">
    <h2>{{ $channel->channel }}</h2>

    <div class="channel-programmes">
      @foreach($channel->programmes as $programme)
        @include('video.programmeCard', ['programme' => $programme])
      @endforeach
    </div>
  </div>
@endforeach

@endsection
