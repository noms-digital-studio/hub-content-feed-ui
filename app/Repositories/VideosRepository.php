<?php

namespace App\Repositories;

use App\Models\Video;
use GuzzleHttp\Client;

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

		foreach ($responseVideos as $video)
		{
			array_push($videos, new Video(
				$video->nid[0]->value, $video->title[0]->value, $video->field_moj_description[0]->value, $video->field_moj_video[0]->url
			));
		}

		return $videos;
	}

	public function find($nid)
	{
		$response = $this->client->get('node/' . $nid, [
			'query' => [
				'_format' => 'json'
			]
		]);

		$responseVideo = json_decode($response->getBody());

		return new Video(
			$responseVideo->nid[0]->value, $responseVideo->title[0]->value, $responseVideo->field_moj_description[0]->value, $responseVideo->field_moj_video[0]->url
		);
	}

	public function getRecent()
	{
		$response = $this->client->get('api/video/recent');

		$responseVideos = json_decode($response->getBody());

		$videos = array();

		if ($responseVideos)
		{
			foreach ($responseVideos as $video)
			{
				array_push($videos, new Video(
					$video->nid, $video->title, $video->description, $video->video_url, !empty($video->thumbnail) ? $video->thumbnail : "", !empty($video->duration) ? $video->duration : "", !empty($video->categories) ? $video->categories : "", !empty($video->channel_name) ? $video->channel_name : ""
				));
			}
		}

		return $videos;
	}

}
