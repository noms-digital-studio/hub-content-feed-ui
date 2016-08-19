<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News as NewsItem;
use App\Facades\News;

class NewsController extends Controller {

  function showNewsLandingPage() {
    $news = News::landingPageNews();

    $groupedNews = array();

    foreach($news as $item) {
      $daysAgo = $item->postAge();
      $daysAgo = $daysAgo > 7 ? 8 : $daysAgo;
      $groupedNews[$daysAgo][] = $item;
    }

    return view('news.landingPage', ['news' => $groupedNews]);
  }
}
