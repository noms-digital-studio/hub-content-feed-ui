<div class="row">
	<ul class="bxslider">
		@foreach($recentVideos as $video)
		<li>
			<a href="../video/{{ $video->getId() }}">
				<div class="col-xs-4">
					<img src="{{ $video->getThumbnail() }}" alt="" />
				</div>
				<div class="col-xs-7">
					<p>{{ $video->getChannel() }}</p>
					<p>{{ $video->getTitle() }}</p>
					<p>{!! $video->getDescription() !!}</p>
					@if($video->getDuration())
						<div class="video-duration">{{ $video->getDuration() }}</div>
					@endif
				</div>
			</a>
		</li>
		@endforeach
	</ul>
</div>
