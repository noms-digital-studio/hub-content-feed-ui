	<ul class="bxslider">
		@foreach($recentVideos as $video)
		<li>
			<div class="row">
				<div class="col-xs-4">
					<a href="../video/{{ $video->getId() }}">
						<img src="{{ $video->getThumbnail() }}" alt="" />
					</a>
				</div>

				<div class="col-xs-7">
					<p>{{ $video->getChannel() }}</p>
					<h2>{{ $video->getTitle() }}</h2>
					<p>{!! $video->getDescription() !!}</p>
					@if($video->getDuration())
						<div class="video-duration">{{ $video->getDuration() }}</div>
					@endif
				</div>
			</div>
		</li>
		@endforeach
	</ul>
