<?php

namespace Teners\LaravelLinkPreview;

use InvalidArgumentException;
use Teners\LaravelLinkPreview\Caches\DefaultAppCache;
use Teners\LaravelLinkPreview\Caches\PackageCache;
use Teners\LaravelLinkPreview\Parsers\HtmlParser;
use Teners\LaravelLinkPreview\Readers\HttpReader;

class LinkPreview
{
    public static function getPreview($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid link provided.");
        }

        if (config('link-preview.enable_caching')) {
            $cache = self::getCacheInstance()->getCache($url);
            if ($cache) return $cache;
        }

        return self::fetchPreview($url);
    }

    private static function getCacheInstance()
    {
        $cacheType = config('link-preview.cache_type');

        switch ($cacheType) {
            case 'model':
                return new PackageCache();
            case 'app':
                return new DefaultAppCache();
            default:
                throw new InvalidArgumentException("Invalid cache type specified in configuration.");
        }
    }

    /**
     * Fetch the link preview using appropriate reader
     */
    private static function fetchPreview($url)
    {
        $content = HttpReader::readUrl($url);
        $preview = HtmlParser::parse($content);

        $expriry_duration = config('link-preview.cache_duration');

        return self::getCacheInstance()->storeCache($url, $preview, $expriry_duration);
    }

    function getPlatformFromLink($url)
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
