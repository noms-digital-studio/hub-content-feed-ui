@extends('layouts.master')

@section('title', $video->getTitle())

@section('top_content')

<div class="video-player-wrap dark">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <video id="video_player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="600" height="240" data-setup='{}'>
          <source src="{{ $video->getUrl() }}">
          <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
      </div>

      <div class="col-md-4 video-details">
        <span class="video-programme">{{ $video->getCategories()->name }}</span>

        <h2 class="video-title">{{ $video->getTitle() }}</h2>

        <div class="video-description">{!! $video->getDescription() !!}</div>
        <div class="video-duration">{{ $video->getDuration() }}</div>

        <div class="video-tags">
          <span class="label">Tags</span>

          <ul>
            @foreach($video->getTags() as $tag)
              <li>
                <a href="#">{{ $tag->name }}</a>
              </li>
            @endforeach
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

@endsection
