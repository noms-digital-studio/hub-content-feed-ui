<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Repositories\VideosRepository;

class VideosController extends Controller {

  protected $videos;

  public function __construct(VideosRepository $videos) {
    $this->videos = $videos;
  }

  function showVideoLandingPage() {
    // return $this->videos->all();
    return \App\Facades\Videos::all();
  }

  function show($nid) {
    return \App\Facades\Videos::find($nid);
    return "test";
  }

}

?>
