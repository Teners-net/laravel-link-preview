<?php

namespace Teners\LaravelLinkPreview;

use InvalidArgumentException;
use Teners\LaravelLinkPreview\Caches\DefaultAppCache;
use Teners\LaravelLinkPreview\Caches\PackageCache;
use Teners\LaravelLinkPreview\Parsers\HtmlParser;
use Teners\LaravelLinkPreview\Readers\HttpReader;

class LinkPreview
{
    /**
     * Validates a provided URL, ensuring it has a valid format.
     *
     * @param string $url The URL to validate
     * @return string The validated URL (with scheme added if necessary)
     *
     * @throws InvalidArgumentException If the URL is invalid
     */
    public static function validateUrl($url): string
    {
        $parsedUrl = parse_url($url);

        if (!$parsedUrl || empty($parsedUrl['scheme'])) $url = "https://" . $url;

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid link provided.");
        }

        return $url;
    }

    /**
     * Retrieves link preview information for a given URL.
     *
     * @param string $url The URL to fetch the preview for
     * @return array|mixed The link preview data, or a cached version if available
     *
     * @throws InvalidArgumentException If the URL is invalid
     */
    public static function getPreview($url)
    {
        $url = self::validateUrl($url);

        if (config('link-preview.enable_caching')) {
            $cache = self::getCacheInstance()->getCache($url);
            if ($cache) return $cache;
        }

        return self::fetchPreview($url);
    }

    /**
     * Returns an instance of the appropriate cache implementation based on configuration.
     *
     * @return DefaultAppCache|PackageCache The cache instance
     */
    private static function getCacheInstance()
    {
        $cacheType = config('link-preview.cache_type');

        switch ($cacheType) {
            case 'app':
                return new DefaultAppCache();
            default:
                return new PackageCache();
        }
    }

    /**
     * Fetches fresh link preview data for a url
     *
     * @param string $url The URL to fetch the preview for
     * @return array|mixed The fresh link preview data
     */
    private static function fetchPreview($url)
    {
        $content = HttpReader::readUrl($url);
        $preview = HtmlParser::parse($content);

        $expriry_duration = config('link-preview.cache_duration');

        return self::getCacheInstance()->storeCache($url, $preview, $expriry_duration);
    }


    /**
     * @param string $url The URL to check
     * @return string|null The platform name (YouTube, Twitter, Vimeo) if detected, otherwise null
     */
    private function getPlatformFromLink($url)
    {
        // YouTube link pattern
        $youtubePattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/(c\/)?|youtu\.be\/)/i';

        // Twitter link pattern
        $twitterPattern = '/^(https?:\/\/)?(www\.)?twitter\.com\//i';

        // Vimeo link pattern
        $vimeoPattern = '/^(https?:\/\/)?(www\.)?vimeo\.com\//i';

        // Check if the URL matches each platform pattern
        if (preg_match($youtubePattern, $url)) return 'YouTube';
        elseif (preg_match($twitterPattern, $url)) return 'Twitter';
        elseif (preg_match($vimeoPattern, $url)) return 'Vimeo';
        else return null;
    }
}
