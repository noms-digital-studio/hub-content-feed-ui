<?php

namespace App\Http\Controllers;

use App\Exceptions\VideoNotFoundException;
use App\Facades\Videos;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\User;
use App\Repositories\NewsRepository;

class NewsController extends Controller {

  protected $newsRepository;

  function __construct(NewsRepository $newsRepository) {
    $this->newsRepository = $newsRepository;
  }

  function showNewsLandingPage() {
    $news = $this->newsRepository->landingPageNews();

    $groupedNews = array();

    foreach($news as $item) {
      $daysAgo = $item->postAge();
      $daysAgo = $daysAgo > 7 ? 8 : $daysAgo;
      $groupedNews[$daysAgo][] = $item;
    }

    return view('news.landingPage', ['news' => $groupedNews]);
  }
}
