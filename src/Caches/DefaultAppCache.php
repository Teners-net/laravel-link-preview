<?php

namespace Teners\LaravelLinkPreview\Caches;

use Illuminate\Support\Facades\Cache;
use Teners\LaravelLinkPreview\Contracts\CacheContract;

class DefaultAppCache implements CacheContract
{
    /**
     * Added to aviod any coincidence on the project cache
     */
    private const CACHE_KEY = "link-preview-";

    /**
     * Retrieves a cached value associated with a given key.
     *
     * @param string $key The identifier for the cached value.
     * @return mixed|null The cached value, or null if not found.
     */
    public function getCache(string $key)
    {
        return Cache::get(self::CACHE_KEY . $key);
    }

    /**
     * Stores a value in the cache with a given key and optional expiry time.
     *
     * @param string $key The identifier for the cached value.
     * @param mixed $value The data to be cached.
     * @param int|null $expiry The time in seconds before the cached value expires (optional).
     */
    public function storeCache(string $key, mixed $value, ?int $expiry)
    {
        Cache::put(self::CACHE_KEY . $key, $value, $expiry);
    }
}
