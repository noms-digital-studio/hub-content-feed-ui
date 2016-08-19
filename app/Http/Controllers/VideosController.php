<?php

namespace App\Http\Controllers;

use App\Facades\Videos;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\User;

class VideosController extends Controller {

  function showVideoLandingPage() {
    $videos = Videos::landingPageVideos();
    $recentVideos = Videos::getRecent();
    $navColour = "nav-bar-red";

    return view('video.landingPage', ['videos' => $videos, 'recentVideos' => $recentVideos, 'navColour' => $navColour]);
  }

  function show($nid) {
    $video = Videos::find($nid);
    $categoryEpisodes = Videos::getCategoryEpisodes($nid);
    $navColour = "nav-bar-blue";

    return view('video.detail', ['video' => $video, 'categoryEpisodes' => $categoryEpisodes, 'navColour' => $navColour]);
  }
}
