@extends('layouts.master')

@section('title', 'Hub')

@section('content')

<div class="hub-content">
	<div class="row">
		<div class="col-xs-12">
			<h1>Hub</h1>
		</div>
	</div>	
	<ul class="row row-centered">
		@foreach($links as $link)
		<li class="col-xs-3 col-centered">
			@if($link->external_link)
			<a href="{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
				@else
				<a href="../{{ $link->url }}" target="_blank" rel="noopener" id="term-{{ $link->tid }}">
					@endif
					<img src="{{ $link->thumbnail }}" alt="" />
					<h2>{{ $link->name }}</h2>
				</a>
		</li>
		@endforeach
	</ul>	

	@endsection