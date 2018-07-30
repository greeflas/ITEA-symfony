<?php

namespace App\Repository;

use GuzzleHttp\ClientInterface;

class BadWordApiRepository
{
    private $client;
    private $apiEndpoint;

    public function __construct(ClientInterface $client, string $endpoint)
    {
        $this->client = $client;
        $this->apiEndpoint = $endpoint;
    }

    public function save($badWords)
    {
        foreach ($badWords as $badWord) {
            $this->client->post($this->apiEndpoint, [
                'body' => [
                    'bad_word' => $badWord,
                ]
            ]);
        }
    }
}
