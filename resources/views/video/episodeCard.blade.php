<div class="card programme-card episode-card">
    <img src="{{  $episode->getThumbnail() }}">
    <div class="programme-title">
      <h6>{{ $episode->getTitle() }}</h6>
    </div>

    <div class="overlay">
        <span class="programme-name">{{ $episode->getChannel() }}</span>
        <a href="{{ action('VideosController@show', $episode->getId()) }}" id="programme-{{ $episode->getId() }}">
            <h4>Play {{ $episode->getTitle() }}</h4>
        </a>
    </div>
</div>
