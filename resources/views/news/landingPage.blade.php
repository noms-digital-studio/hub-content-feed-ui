@extends('layouts.master')

@section('title', 'News')

@section('top_content')
<div class="news-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 align="center">News and Announcements</h1>
        <p align="center">The place to go if you want to find the latest news and accouncements about your prison.</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('header')

<div class="header-nav-wrap yellow">
  <div class="container" id="header">
    <div class="row">
      <div class="col-xs-12">
        <a href="/">
          <img src="/img/icon-back-black.png" id="return-to-the-hub-arrow">
            <div class="return-to-the-hub-text black">
              {{ trans('navigation.title') }}
            </div>
        </a>
        <h2 class="page-title black">
          <a href="{{ action('NewsController@showNewsLandingPage') }}">
            <img src="/img/icon-news.png" id="page-icon">
            Wayland News
          </a>
        </h2>
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
              <h4 id="posts-{{$daysAgo}}-ago"><span>Today</span></h4>
          @elseif ($daysAgo == 1)
              <h4 id="posts-{{$daysAgo}}-ago"><span>Yesterday</span></h4>
          @elseif ($daysAgo > 7)
              <h4 id="posts-{{$daysAgo}}-ago"><span>Over 1 week ago</span></h4>
          @else
              <h4 id="posts-{{$daysAgo}}-ago"><span>{{ $daysAgo }} days ago</span></h4>
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
