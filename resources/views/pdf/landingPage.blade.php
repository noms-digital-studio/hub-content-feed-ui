@extends('layouts.master')

@section('title', 'Education')

@section('top_content')
<div class="education-header">
  <div class="container" id="header">
    <div class="row">
      <div class="col-xs-12">
        <a href="/" class="back-to-hub">
          <span class="icon icon-icon-back-white" aria-hidden="true"></span>
          <div class="back-to-the-hub-text white">
            {{ trans('navigation.title') }}
          </div>
        </a>
        <h2 class="page-title white">
					<span class="icon icon-icon-courses" aria-hidden="true"></span>
					Educational Courses
        </h2>
      </div>
    </div>
		<div class="row">
			<div class="col-xs-12">
				<h1>{{ $categories->parent->cat_name }}</h1>
				@if($categories->parent->cat_description)
					<p>{!! $categories->parent->cat_description !!}</p>
				@endif
			</div>
		</div>
  </div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<p>{!! $categories->parent->additional_description !!}</p>
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
