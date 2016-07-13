@extends('layouts.master'   )

@section('title', 'Video title')

@section('content')

    <h1>{{ $video->getTitle() }}</h1>
    <div>{!! $video->getDescription() !!}</div>

    <video width="480" controls>
        <source src="{{ $video->getUrl() }}">
    </video>

@endsection
