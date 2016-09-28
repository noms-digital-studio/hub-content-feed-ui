@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row hub-title">
		<div class="col-xs-12">
			@if ($page->id)
				<a href="{{ action('HubLinksController@getItem', $page->parent->id) }}">
					Back to {{ $page->parent->title }}
				</a>
				<h1><img src="{{ $page->icon }}" alt="{{ $page->title }}" style="height:1.5em;width:auto;vertical-align:middle;"> {{ $page->title }}</h1>
			@else
				<img src="/img/icon-hub.png" alt="{{ $page->title }}">
				<h1>{{ $page->title }}</h1>
			@endif
		</div>
	</div>

	<ul class="row row-centered hub-thumb">
		@foreach($page->links as $link)
		<li class="col-xs-2 col-centered">
			@if(!$link->url)
			<a href="{{ action('HubLinksController@getItem', $link->nid) }}" rel="noopener" id="term-{{ $link->nid }}">
			@else
			<a href="{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->nid }}">
			@endif
				<img src="{{ $link->thumbnail }}" alt="{{ $link->title }}" />
				<h4>{{ $link->title }}</h4>
			</a>
		</li>
		@endforeach
	</ul>

</div>

@endsection
