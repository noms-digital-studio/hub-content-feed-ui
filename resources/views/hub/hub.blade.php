@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row hub-title">
		<div class="col-xs-12">
      <img src="/img/icon-hub.png">
			<h1>The Hub</h1>
		</div>
	</div>
	<ul class="row row-centered hub-thumb">
		@foreach($links as $link)
		<li class="col-xs-3 col-centered">
			@if($link->folder)
			<a href="hub/{{ $link->tid }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
			@else
			<a href="{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
			@endif
				<img src="{{ $link->thumbnail }}" alt="" />
				<h3>{{ $link->name }}</h3>
			</a>
		</li>
		@endforeach
	</ul>

	@endsection
