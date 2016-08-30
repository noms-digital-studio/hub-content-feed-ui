<div class="card programme-card">
    <img src="{{ $radio->thumbnail }}">
    <div class="programme-title">
      <h6>{{ $radio->title }}</h6>
    </div>

    <div class="overlay">
        <span class="programme-name">{{ $radio->title }}</span>
        <a href="radio/{{ $radio->episode_nid }}" id="programme-{{ $radio->tid }}">
            <h4>{{ trans('radio.play') }} {{ $radio->description }}</h4>
        </a>
    </div>
</div>
