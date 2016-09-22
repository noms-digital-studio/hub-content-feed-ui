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
				<h1>{{ $pdfs->parent->cat_name }}</h1>
				<p>{!! $pdfs->parent->cat_description !!}</p>
			</div>
		</div>
  </div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
      <p>{!! $pdfs->parent->additional_description !!}</p>
			<a href="{{ action('PdfsController@showPdfLandingPage', $pdfs->parent->parent_tid) }}" id="back-to-cat"><span class="icon icon-icon-back" aria-hidden="true"></span>{{ $pdfs->parent->parent_name }}</a>
			<ul>
				@foreach($pdfs->pdfs as $pdf)
				<li>
					<a class="pdf-link" href="{{ $pdf->pdf_url}}" id="course-{{ $pdf->nid }}" target="_blank">
						<span class="icon icon-icon-certificate" aria-hidden="true"></span>
						{{ $pdf->title }}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
