<?php

namespace Teners\LaravelLinkPreview\Parsers;

use Symfony\Component\DomCrawler\Crawler;
use Teners\LaravelLinkPreview\Contracts\ParserContract;

class HtmlParser implements ParserContract
{
    private const TAGS = [
        'icon' => [
            ['selector' => 'link[rel="icon"]', 'attribute' => 'href'],
            ['selector' => 'link[rel="apple-touch-icon"]', 'attribute' => 'href'],
        ],

        'title' => [
            ['selector' => 'title'],
            ['selector' => 'meta[property="og:title"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="twitter:title"]', 'attribute' => 'content'],
            ['selector' => 'h1'],
        ],

        'description' => [
            ['selector' => 'meta[name="description"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="og:description"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="twitter:description"]', 'attribute' => 'content'],
            ['selector' => 'p'],
        ],

        'cover' => [
            ['selector' => 'meta[property="og:image"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="twitter:image"]', 'attribute' => 'content'],
            ['selector' => 'img', 'attribute' => 'src'],
        ],

        'author' => [
            ['selector' => 'meta[name="author"]', 'attribute' => 'content'],
        ],

        'keywords' => [
            ['selector' => 'meta[name="keywords"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="keywords"]', 'attribute' => 'content'],
        ],

        'video' => [
            ['selector' => 'meta[property="og:video"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="twitter:player:stream"]', 'attribute' => 'content'],
        ],

        'video_type' => [
            ['selector' => 'meta[property="og:video:type"]', 'attribute' => 'content'],
            ['selector' => 'meta[property="twitter:player:stream:content_type"]', 'attribute' => 'content'],
        ],
    ];

    /**
     * Parses HTML content using DOM crawler to extract link preview information.
     *
     * This method extracts various preview elements (title, description, cover, etc.)
     * from the provided HTML content using a defined set of selectors and attributes.
     *
     * @param object $reader An object containing the HTML content to be parsed.
     * @return array An associative array containing extracted preview elements.
     * @throws \Throwable If an error occurs during parsing.
     */
    public static function parse($reader): array
    {
        $preview = [];

        try {
            $crawler = new Crawler();
            $crawler->addContent($reader->body);

            foreach (self::TAGS as $tag => $selectors) {
                foreach ($selectors as $selector) {
                    $element = $crawler->filter($selector['selector'])->first();

                    if ($element->count() > 0) {
                        $attribute = isset($selector['attribute']) ? $element->attr($selector['attribute']) : null;
                        $parsedValue = $attribute ?: $element->text();
                        $parsedValue = self::cleanString($parsedValue);

                        if (empty($parsedValue)) continue;

                        $preview[$tag] = $parsedValue;
                        break;
                    }
                }
            }
        } catch (\Throwable $th) {
            // throw new $th;
        }

        return $preview;
    }

    /**
     * Cleans a string by removing extra whitespace, decoding HTML entities, and encoding special characters.
     *
     * This method ensures consistent string representation by applying specific cleaning steps.
     *
     * @param string $string The string to be cleaned.
     * @return string The cleaned string.
     */
    private static function cleanString($string): string
    {
        $string = trim($string);
        $string = htmlspecialchars_decode($string);
        $string = htmlentities($string, ENT_QUOTES, 'UTF-8');

        return $string;
    }
}
