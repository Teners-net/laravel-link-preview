<?php

namespace Teners\LaravelLinkPreview\Readers;

use Exception;
use GuzzleHttp\Client;

class HttpReader
{
    public function __construct()
    {
    }

    /**
     * Read the contents of a url's page/response
     *
     * @param string $url The URL to read
     * @return object The body and content type of the url's response
     */
    public static function readUrl($url): object
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
        } catch (Exception $e) {
        }
    }
}
