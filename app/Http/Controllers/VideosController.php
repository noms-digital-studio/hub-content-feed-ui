<?php

namespace App\Http\Controllers;

use App\Facades\Videos;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Repositories\VideosRepository;
use App\User;

class VideosController extends Controller {

  function showVideoLandingPage() {
    $videos = Videos::all();

    return view('video.landingPage', ['videos' => $videos]);
  }

  function show($nid) {
    $video = Videos::find($nid);

    return view('video.detail', ['video' => $video]);
  }

}
