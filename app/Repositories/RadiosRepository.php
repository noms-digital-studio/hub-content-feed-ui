<?php

namespace App\Repositories;

use App\Exceptions\ClientErrorException;
use App\Exceptions\ForbiddenException;
use App\Exceptions\RadioNotFoundException;
use App\Exceptions\ServerErrorException;
use App\Models\Radio;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class RadiosRepository
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

    public function landingPageRadios()
    {
        $response = $this->client->get($this->locale . '/api/radio/landing');

        $responseTree = json_decode($response->getBody());

        return $responseTree;
    }

}
