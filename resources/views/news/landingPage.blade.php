@extends('layouts.master')

@section('title', 'News')

@section('header')

@include('stickyNavigation', ['title' => 'Wayland News', 'icon' => 'icon-icon-news', 'titleLink' => action('NewsController@showNewsLandingPage'), 'colour' => 'yellow' ])

<div class="header-nav-wrap yellow">
  <div class="container" id="header">
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
  </div>
</div>

@endsection

@section('content')

<div class="col-xs-9">
  <div class="news-items">
    @if (count($promoted))
      <div id="posts-important">
        @foreach($promoted as $newsItem)
          @include('news.item', ['newsItem' => $newsItem])
        @endforeach
      </div>
    @endif

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
        @include('news.item', ['newsItem' => $newsItem])
      @endforeach
    @endforeach
  </div>
</div>

<div class="col-xs-3">
  <div class="news-jump-to">
    <h5>Jump to:</h5>
    <ul>
      @if (count($promoted))
        <li><a href="#posts-important">Important ({{ count($promoted) }})</a></li>
      @endif
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
