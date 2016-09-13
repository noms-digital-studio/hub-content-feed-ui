<div class="card programme-card radio-card">
	<div class="shadow">
		<img src="{{ $radio->thumbnail }}">
		<div class="programme-title">
			<h6>{{ $radio->title }}</h6>
		</div>

		<div class="overlay">
			<a href="radio/{{ $radio->episode_nid }}" id="programme-{{ $radio->tid }}">
				<span class="programme-name">{{ $radio->title }}</span>
				<div class="programme-description">
					{!! $radio->description !!}
				</div>

				<div class="programme-text">
					<h4><span class="icon icon-play-button"></span>{{ trans('radio.play') }}</h4>
				</div>
				<img src="/img/equaliser.png" class="equaliser" />
			</a>
		</div>
	</div>
</div>
