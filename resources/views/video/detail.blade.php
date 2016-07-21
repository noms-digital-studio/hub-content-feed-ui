@extends('layouts.master'   )

@section('title', 'Video title')

@section('content')


<div class="row">
    <div class="col-md-6">
          <video id="video_player" class="video-js vjs-default-skin vjs-big-play-centered"
              controls preload="auto" width="600" height="240"
              poster=""
              data-setup='{"example_option":true}'>
              <source src="{{ $video->getUrl() }}">
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
          </video>
    </div>

    <div class="col-md-4">
        <div>{{ $video->getCategories()->name}}</div>
        <h2>{{ $video->getTitle() }}</h2>
        <div>{!! $video->getDescription() !!}</div>
        <div>{{ $video->getDuration()}}</div>
          <ul>
            @foreach($video->getTags() as $tag)
            <li>
              <a href="#">{{$tag->name}}</a>
            </li>
            @endforeach
          </ul>
    </div>
</div>

@endsection
