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
				<h1>{{ $pdfs->parent->cat_name }}</h1>
				<p>{{ $pdfs->parent->cat_description }}</p>				
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="container education-container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">			
			<a href="{{ action('PdfsController@showPdfLandingPage', $pdfs->parent->parent_tid) }}" class="icon-icon-back" id="back-to-cat">{{ $pdfs->parent->parent_name }}</a>			
			<ul>
				@foreach($pdfs->pdfs as $pdf)
				<li>					
					<a class="pdf-link" href="{{ $pdf->pdf_url}}" id="course-{{ $pdf->nid }}" target="_blank">
						<span class="icon-icon-certificate"></span>
						{{ $pdf->title }}
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection