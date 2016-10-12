@extends('layouts.master')

@section('title', 'Education')

@section('top_content')

@include('stickyNavigation', ['title' => 'NEC Courses', 'icon' => 'icon-icon-education', 'titleLink' => '', 'colour' => 'purple', 'titleLink' => action('PdfsController@showPdfLandingPage', $categories->parent->cat_id), 'colour' => 'purple' ])

<div class="header-nav-wrap purple">
	<div class="container" id="header">
  		<div class="education-header">
			<div class="row">
				<div class="col-xs-12">
					@if($categories->parent->cat_description)
						{!! $categories->parent->cat_description !!}
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			{!! $categories->parent->additional_description !!}
			<h3>{{ trans('pdf.subjects') }}</h3>
			<ul>
				@foreach($categories->children as $category)
				<li>
					<a href="{{ action('PdfsController@show', $category->tid) }}" id="course-{{ $category->tid }}">
						<span class="icon icon-icon-folder-purple" aria-hidden="true"></span>
						{{ $category->name }}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
