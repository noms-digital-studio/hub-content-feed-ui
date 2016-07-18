<div class="card programme-card">
    <img src="{{ $programme->episodes->thumbnail }}">
    <h3>{{ $programme->title }}</h3>

    <div class="overlay">
        <span class="programme-name">{{ $programme->title }}</span>
        <a href="/video/{{ $programme->episodes->nid }}">
            <h4>Play {{ $programme->episodes->title }}</h4>
        </a>
    </div>
</div>