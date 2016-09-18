<div class="card programme-card radio-card">
	<div class="shadow">
		<img src="{{ $radio->thumbnail }}" alt="{{ $radio->title }}">
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
					<h4><span class="icon icon-play-button" aria-hidden="true"></span>{{ trans('radio.play') }}</h4>
				</div>
			</a>
		</div>
	</div>
</div>