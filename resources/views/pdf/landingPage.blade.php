@extends('layouts.master')

@section('title', 'Education')

@section('top_content')
<div class="education-header">	
	<a href="/"  class="back-to-hub">
		{{ trans('navigation.title') }}
	</a>	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">				
				<p class="education-title"><span class="icon-icon-courses"></span> {{ trans('pdf.title')}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">				
				<h1>{{ $categories->parent->cat_name }}</h1>
				<p>{{ $categories->parent->cat_tagline_description }}</p>				
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<p>{!! $categories->parent->cat_description !!}</p>

			<h3>{{ trans('pdf.subjects') }}</h3>
			<ul>
				@foreach($categories->children as $category)
				<li>						
					<a href="{{ action('PdfsController@show', $category->tid) }}" id="course-{{ $category->tid }}">
						{{ $category->name }}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection