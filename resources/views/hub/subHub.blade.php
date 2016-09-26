@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row">
		<div class="col-xs-12 page-title">
			<a href="/" class="back-to-hub">
				<span class="icon icon-icon-back" aria-hidden="true"></span>
				<div class="back-to-the-hub-text blue">
					{{ trans('navigation.title') }}
				</div>
			</a>
			<h1 class="page-title">@if(count($links) > 0) {{ $links[0]->parent }} @else No links @endif</h1>
		</div>
	</div>
	<ul class="row row-centered">
		@foreach($links as $link)
		<li class="col-xs-2 col-centered">
			@if($link->folder)
			<a href="hub/{{ $link->tid }}" rel="noopener" id="term-{{ $link->tid }}">
			@else
			<a href="{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
			@endif
				<img src="{{ $link->thumbnail }}" alt="{{ $link->name }}" />
				<h4>{{ $link->name }}</h4>
			</a>
		</li>
		@endforeach
	</ul>
</div>

@endsection
