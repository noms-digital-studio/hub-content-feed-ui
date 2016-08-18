<?php

namespace App\Repositories;

use App\Exceptions\ClientErrorException;
use App\Exceptions\ForbiddenException;
use App\Exceptions\VideoNotFoundException;
use App\Exceptions\ServerErrorException;
use App\Models\Video;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class VideosRepository
{
    protected $client;
    protected $locale = '';

    public function __construct()
    {
        $this->client = new Client(array(
            'base_uri' => $_ENV['API_URI'],
            'timeout' => 60.0
        ));

        $this->locale = \App::getLocale();
        if ($this->locale == 'en') {
          $this->locale = '';
        }
    }

    public function landingPageVideos()
    {
        $response = $this->client->get($this->locale . '/api/video/landing');

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
            $response = $this->client->get($this->locale . '/api/video/' . $nid);
        } catch (ClientException $e) {
            switch($e->getResponse()->getStatusCode()) {
                case 404:
                    throw new VideoNotFoundException('Video not found: ' . $nid);
                case 403:
                    throw new ForbiddenException('You are forbidden from viewing this video.');
                default:
                    throw new ClientErrorException();
            }     
        } catch (ServerException $e) {
            throw new ServerErrorException();
        }

        $video = json_decode($response->getBody());

        return new Video(
            $video->nid,
            $video->title,
            $video->description,
            $video->video_url,
            !empty($video->thumbnail) ? $video->thumbnail : "",
            !empty($video->duration) ? $video->duration : "",
            !empty($video->categories) ? $video->categories : "",
            $video->tags,
            !empty($video->channel_name) ? $video->channel_name : ""
        );
    }

    public function getRecent()
	{
		$response = $this->client->get($this->locale . '/api/video/recent');

		$responseVideos = json_decode($response->getBody());

		$videos = array();

		if ($responseVideos)
		{
			foreach ($responseVideos as $video)
			{
				array_push($videos, new Video(
				    $video->nid,
            $video->title,
            $video->description,
            $video->video_url,
            !empty($video->thumbnail) ? $video->thumbnail : "",
            !empty($video->duration) ? $video->duration : "",
            $video->categories,
            $video->tags,
            !empty($video->channel_name) ? $video->channel_name : ""
				));
			}
		}

		return $videos;
	}

  public function getCategoryEpisodes($nid)
  {
    $response = $this->client->get($this->locale . '/api/video/episodes/' . $nid);

    $responseVideos = json_decode($response->getBody());

    $videos = array();

    if ($responseVideos)
    {
      foreach ($responseVideos as $video)
      {
        array_push($videos, new Video(
            $video->nid,
            $video->title,
            $video->description,
            $video->video_url,
            !empty($video->thumbnail) ? $video->thumbnail : "",
            !empty($video->duration) ? $video->duration : "",
            $video->categories,
            $video->tags,
            !empty($video->channel_name) ? $video->channel_name : ""
        ));
      }
    }
    return $videos;
  }
}
