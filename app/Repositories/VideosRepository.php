<?php

namespace App\Repositories;

use App\Models\Video;
use GuzzleHttp\Client;

class VideosRepository {

  protected $client;

  public function __construct() {
    $this->client = new Client(array(
      'base_uri' => 'http://192.168.33.9',
      'timeout' => 60.0
    ));
  }

  public function all() {
    $response = $this->client->get('api/videos');

    $responseVideos = json_decode($response->getBody());

    $videos = array();

    foreach($responseVideos as $video) {
      array_push($videos, new Video(
        $video->nid[0]->value,
        $video->title[0]->value,
        $video->field_moj_description[0]->value,
        $video->field_moj_video[0]->url
      ));
    }

    return $videos;
  }

  public function find($nid) {
    $response = $this->client->get('node/' . $nid);

    $responseVideo = json_decode($response->getBody());

    return $responseVideo;
  }

}
