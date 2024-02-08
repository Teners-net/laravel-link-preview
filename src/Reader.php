<?php

namespace Teners\LaravelLinkPreview;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class Reader
{
    public function __construct()
    {
    }

    public static function readurl($url)
    {
        $client = new Client();
        $config = [
            'allow_redirects' => ['max' => 5],
            'headers' => [
                'User-Agent' => 'Teners/url-preview v1.0.0'
            ]
        ];

        try {
            $response = $client->request('GET', $url, $config);

            return (object) [
                'body' => $response->getBody(),
                'content_type' => $response->getHeader('Content-Type')[0]
            ];
        } catch (ConnectException $e) {
        }
    }
}