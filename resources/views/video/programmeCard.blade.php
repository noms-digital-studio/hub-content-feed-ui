<div class="card programme-card">
	<div class="shadow">
		<img src="{{ $programme->episodes->thumbnail }}" alt="{{ $programme->title }}">
		<div class="programme-title">
			<h6>{{ $programme->title }}</h6>
		</div>

		<div class="overlay">
			<a href="{{ action('VideosController@show', $programme->episodes->nid) }}" id="programme-{{ $programme->episodes->nid }}">
				<span class="programme-name">{{ $programme->title }}</span>
				<h4><span class="icon icon-play-button" aria-hidden="true"></span>{{ trans('video.play') }}:<br /> {{ $programme->episodes->title }}</h4>
			</a>
		</div>
	</div>
</div>
