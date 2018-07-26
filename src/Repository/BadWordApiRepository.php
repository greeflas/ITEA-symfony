<?php

namespace App\Repository;

use GuzzleHttp\Client;

class BadWordApiRepository
{
    private $apiEndpoint;

    public function __construct(string $endpoint)
    {
        $this->apiEndpoint = $endpoint;
    }

    public function save($badWords)
    {
        $client = new Client();

        foreach ($badWords as $badWord) {
            $client->post($this->apiEndpoint, [
                'body' => [
                    'bad_word' => $badWord,
                ]
            ]);
        }
    }
}
