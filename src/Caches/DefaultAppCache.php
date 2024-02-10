<?php

namespace Teners\LaravelLinkPreview\Caches;

use CacheContract;
use Illuminate\Support\Facades\Cache;

class DefaultAppCache implements CacheContract
{
    /**
     * get the link cache
     */
    public function getCache(string $key)
    {
        return Cache::get($key);
    }

    /**
     * Store the link cache
     */
    public function storeCache(string $key, mixed $value, int $expiry)
    {
        Cache::put($key, $value, $expiry);
    }
}
