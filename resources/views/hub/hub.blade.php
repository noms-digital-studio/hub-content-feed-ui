@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row hub-title">
		<div class="col-xs-12">
      <img src="/img/icon-hub-medium.png">
			<h1>The Hub</h1>
		</div>
	</div>
	<ul class="row row-centered hub-thumb">
		@foreach($links as $link)
		<li class="col-xs-2 col-centered">
			@if($link->folder)
			<a href="hub/{{ $link->tid }}" rel="noopener" id="term-{{ $link->tid }}">
			@else
			<a href="{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
			@endif
				<img src="{{ $link->thumbnail }}" alt="" />
				<h4>{{ $link->name }}</h4>
			</a>
		</li>
		@endforeach
	</ul>
</div>

	@endsection
