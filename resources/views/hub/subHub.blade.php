@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row">
		<div class="col-xs-12">
			<a href="../" id="hub-back" class="icon-icon-back">Return to The Hub</a><h1 class="page-title">@if(count($links) > 0) {{ $links[0]->parent }} @else No links @endif</h1>
		</div>
	</div>

	<div class="row hub-title">
		<div class="col-xs-12">

		</div>
	</div>
	<ul class="row row-centered">
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
</div>

@endsection
