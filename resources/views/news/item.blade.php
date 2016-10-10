<div class="news-item {{ $newsItem->isSticky() ? 'important' : '' }}">
  <h4 class="news-item--title">{{ $newsItem->getTitle() }}</h4>

  @if ($newsItem->isSticky())
    <span class="news-item--icon icon icon-news-reminder"></span>
    <span class="news-item--pinned icon icon-news-pinned"></span>
  @else
    <span class="news-item--icon icon icon-news-general"></span>
  @endif

  <div class="news-item--body">
    {!! $newsItem->getTrimmedDescription() !!}
  </div>

  <div class="news-item--posted">Posted: {{ $newsItem->getDate() }} at {{ $newsItem->getTime() }}</div>

  @if ($newsItem->hasLongDescription())
    <div id="news-modal-{{ $newsItem->getId() }}" class="news-modal" style="display:none;">
      <h4 class="news-modal--title">{{ $newsItem->getTitle() }}</h4>

      <div class="news-modal--body">
        {!! $newsItem->getDescription() !!}
      </div>

      <div class="news-modal--posted">Posted: {{ $newsItem->getDate() }} at {{ $newsItem->getTime() }}</div>
    </div>

    <a href="#news-modal-{{ $newsItem->getId() }}" class="btn btn-read-more" rel="modal:open">
      Show more
    </a>
  @endif
</div>