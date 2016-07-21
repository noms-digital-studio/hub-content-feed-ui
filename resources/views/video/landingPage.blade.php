@extends('layouts.master'   )

@section('title', 'Videos')

@section('content')

	@include('video.recentVideo', ['recentVideos' => $recentVideos])

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
