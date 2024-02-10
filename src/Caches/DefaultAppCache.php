<?php

namespace Teners\LaravelLinkPreview\Caches;

use Illuminate\Support\Facades\Cache;
use Teners\LaravelLinkPreview\Contracts\CacheContract;

class DefaultAppCache implements CacheContract
{
    private const CACHE_KEY = "link-preview-";

    /**
     * get the link cache
     */
    public function getCache(string $key)
    {
        return Cache::get(self::CACHE_KEY . $key);
    }

    /**
     * Store the link cache
     */
    public function storeCache(string $key, mixed $value, ?int $expiry)
    {
        Cache::put(self::CACHE_KEY . $key, $value, $expiry);
    }
}
