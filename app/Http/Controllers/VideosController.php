<?php

namespace App\Http\Controllers;

use App\Facades\Videos;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Repositories\VideosRepository;
use App\User;

class VideosController extends Controller {

  protected $videos;

  public function __construct(VideosRepository $videos) {
    $this->videos = $videos;
  }

  function showVideoLandingPage() {
    $videos = Videos::all();

    return $videos;
  }

  function show($nid) {
    $video = Videos::find($nid);

    return $video;
  }

}

?>
