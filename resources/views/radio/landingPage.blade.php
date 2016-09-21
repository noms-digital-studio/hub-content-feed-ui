@extends('layouts.master')

@section('title', 'Radio')

@section('header')

<div class="header-nav-wrap light-blue">
	<div class="container" id="header">
		<div class="row">
			<div class="col-xs-12">
				<a href="/" class="back-to-hub">
					<span class="icon icon-icon-back-white" id="return-to-the-hub-arrow" aria-hidden="true"></span>
					<div class="return-to-the-hub-text white">
						{{ trans('navigation.title') }}
					</div>
				</a>
				<h2 class="radio-title">
					<a href="{{ action('RadiosController@showRadioLandingPage') }}">
						<span class="icon icon-icon-radio" aria-hidden="true"></span>
						{{ trans('navigation.radio') }}
					</a>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="radio-description">
					<p>{{ trans('radio.description') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<br />
<br />
<div class="channel-programmes channel-episodes radio-episodes">
	@foreach($radios as $radio)
		@include('radio.programmeCard', ['radio' => $radio])
	@endforeach
</div>



@endsection
