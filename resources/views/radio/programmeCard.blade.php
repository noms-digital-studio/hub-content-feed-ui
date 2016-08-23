<div class="card programme-card">
    <img src="{{ $programme->episodes->thumbnail }}">
    <div class="programme-title">
      <h6>{{ $programme->title }}</h6>
    </div>

    <div class="overlay">
        <span class="programme-name">{{ $programme->title }}</span>
        <a href="{{ action('RadiosController@show', $programme->episodes->nid) }}" id="programme-{{ $programme->episodes->nid }}">
            <h4>{{ trans('radio.play') }} {{ $programme->episodes->title }}</h4>
        </a>
    </div>
</div>
