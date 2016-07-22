<div class="card episode-card">
    <a href="/video/{{ $episode->getId() }}" style="position:relative">
        <img src="{{ $episode->getThumbnail()}}">
    </a>
    <div class="episode-title">
      <h6>{{ $episode->getTitle() }}</h6>
    </div>
</div>
