@extends('layouts.master')

@section('title', 'News')

@section('header')

@include('stickyNavigation', ['title' => 'Wayland News', 'icon' => 'icon-icon-news', 'titleLink' => action('NewsController@showNewsLandingPage'), 'colour' => 'yellow' ])

<div class="header-nav-wrap news">
  <div class="container" id="header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <p align="center">The place to go if you want to find the latest news and accouncements about your prison.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

<div class="col-xs-9">
    <div class="news-items">
      @foreach($news as $daysAgo => $group)

          @if ($daysAgo == 0)
              <span class="posted-ago" id="posts-{{$daysAgo}}-ago"><span>Today</span></span>
          @elseif ($daysAgo == 1)
              <span class="posted-ago" id="posts-{{$daysAgo}}-ago"><span>Yesterday</span></span>
          @elseif ($daysAgo > 7)
              <span class="posted-ago" id="posts-{{$daysAgo}}-ago"><span>Over 1 week ago</span></span>
          @else
              <span class="posted-ago" id="posts-{{$daysAgo}}-ago"><span>{{ $daysAgo }} days ago</span></span>
          @endif

          @foreach($group as $newsItem)
            <hr/>
              <div class="news-item">
                <h3>{{ $newsItem->getTitle() }}</h3>
                <div>{!! $newsItem->getTrimmedDescription() !!}</div>
                <div align="Right">Posted: {{ $newsItem->getDate() }} at {{ $newsItem->getTime() }}</div>

                @if ($newsItem->hasLongDescription())
                  <div id="news-modal-{{ $newsItem->getId() }}" style="display:none;">
                    <h3>{{ $newsItem->getTitle() }}</h3>
                    <div>{!! $newsItem->getDescription() !!}</div>
                    <br/>
                    <div align="Right">Posted: {{ $newsItem->getDate() }} at {{ $newsItem->getTime() }}</div>
                  </div>

                  <div class="read-more-button-link"><a href="#news-modal-{{ $newsItem->getId() }}" rel="modal:open"><div class="read-more-button">Read more</div></a></div>
                @endif

              </div>

          @endforeach
      @endforeach
    </div>
</div>

<div class="col-xs-3">
  <div class="jump-to">
    <ul style="list-style-type: none;">
      <p>Jump to:</p>
      @foreach($news as $daysAgo => $group)

        @if ($daysAgo == 0)
            <li><a href="#posts-{{$daysAgo}}-ago">Today ({{ count($group) }})</a></li>
        @elseif ($daysAgo == 1)
            <li><a href="#posts-{{$daysAgo}}-ago">Yesterday ({{ count($group) }})</a></li>
        @elseif ($daysAgo > 7)
            <li><a href="#posts-{{$daysAgo}}-ago">Over 1 week ago ({{ count($group) }})</a></li>
        @else
            <li><a href="#posts-{{$daysAgo}}-ago">{{ $daysAgo }} days ago ({{ count($group) }})</a></li>
        @endif

      @endforeach
    </ul>
  </div>
</div>

@endsection
