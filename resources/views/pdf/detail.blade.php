@extends('layouts.master')

@section('title', 'Education')

@section('top_content')

@include('stickyNavigation', ['title' => 'NEC Courses', 'icon' => 'icon-icon-education', 'titleLink' => action('PdfsController@showPdfLandingPage', $pdfs->parent->parent_tid), 'colour' => 'purple' ])

<div class="header-nav-wrap purple">
  <div class="container" id="header">
		<div class="row">
			<div class="col-xs-12">
				{!! $pdfs->parent->cat_description !!}
			</div>
		</div>
  </div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
      {!! $pdfs->parent->additional_description !!}
			<div class="pdf-back"><a href="{{ action('PdfsController@showPdfLandingPage', $pdfs->parent->parent_tid) }}" id="back-to-cat"><span class="icon icon-icon-back" aria-hidden="true"></span>Back</a></div>
      <h3>{{ $pdfs->parent->parent_name }}</h3>
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
