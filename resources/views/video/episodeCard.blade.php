<div class="card programme-card episode-card">
	<div class="shadow">
		<img src="{{  $episode->getThumbnail() }}">
		<span class="icon icon-play-button-white"></span>
		<div class="programme-title">
			<h6>{{ $episode->getTitle() }}</h6>
			<span class="duration"><span class="icon icon-icon-clock"></span>{{ $episode->getDuration() }}</span>
		</div>

		<div class="overlay">        
			<a href="{{ action('VideosController@show', $episode->getId()) }}" id="programme-{{ $episode->getId() }}">
				<span class="programme-name">{{ $episode->getChannel() }}</span>
				<h4><span class="icon icon-play-button"></span>{{ trans('video.play') }}:<br />{{ $episode->getTitle() }}</h4>
			</a>
		</div>
	</div>	
</div>