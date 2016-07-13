@extends('layouts.master'   )

@section('title', 'Videos')

@section('content')

    @foreach($videos as $video)

        @include('video.videoCard', ['video' => $video])

    @endforeach

@endsection
