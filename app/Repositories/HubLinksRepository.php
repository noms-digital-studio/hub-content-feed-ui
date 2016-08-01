<?php

namespace App\Repositories;

use App\Exception\VideoNotFoundException;
use App\Models\Video;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class HubLinksRepository
{

	protected $client;

	public function __construct()
	{
		$this->client = new Client(array(
			'base_uri' => $_ENV['API_URI'],
			'timeout' => 60.0
		));
	}

	public function topLevelItems()
	{
		$response = $this->client->get('api/hub');

		$responseLinks = json_decode($response->getBody());

		return $responseLinks;
	}

	public function subLevelItems($tid)
	{
		$response = $this->client->get('api/hub/sub/' . $tid);

		$responseLinks = json_decode($response->getBody());

		return $responseLinks;
	}

}
