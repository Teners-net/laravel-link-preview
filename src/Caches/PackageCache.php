<?php

namespace Teners\LaravelLinkPreview\Caches;

use CacheContract;
use LinkPreview;

class PackageCache implements CacheContract
{
    /**
     * get the link cache
     */
    public function getCache(string $url)
    {
        $cachedPreview = LinkPreview::whereFirst('url', $url);

        if ($cachedPreview) {
            return $cachedPreview->toArray();
        }

        return null;
    }

    /**
     * Store the link cache
     */
    public function storeCache(string $key, mixed $value, int $expiry)
    {
        LinkPreview::create();
    }
}

