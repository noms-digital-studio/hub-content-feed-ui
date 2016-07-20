<?php

namespace App\Repositories;

use App\Models\Video;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class VideosRepository
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client(array(
            'base_uri' => 'http://192.168.33.9',
            'timeout' => 60.0
        ));
    }

    public function landingPageVideos()
    {
        $response = $this->client->get('api/video/landing');

        $responseTree = json_decode($response->getBody());

        return $responseTree;
    }

    public function all()
    {
        $response = $this->client->get('api/videos');

        $responseVideos = json_decode($response->getBody());

        $videos = array();

        foreach ($responseVideos as $video) {
            array_push($videos, new Video(
                $video->nid[0]->value,
                $video->title[0]->value,
                $video->field_moj_descriptio[0]->value,
                $video->field_moj_duration[0]->value,
                $video->field_moj_video[0]->url,
                $video->field_moj_tags[0]->url
            ));
        }
        return $videos;
    }

    public function find($nid)
    {
        try {
            $response = $this->client->get('/api/video/' . $nid);
        } catch (ClientException $e) {
           return json_decode($e->getResponse()->getBody());
        }

        $responseVideo = json_decode($response->getBody());

        $duration = '';
        if (count($responseVideo->duration)) {
          $responseVideo->duration[0]->value;
        }

        return new Video(
            $responseVideo->nid,
            $responseVideo->title,
            $responseVideo->description[0]->value,
            $duration,
            $responseVideo->video,
            $responseVideo->tags,
            $responseVideo->categories[0]
        );
    }
}
