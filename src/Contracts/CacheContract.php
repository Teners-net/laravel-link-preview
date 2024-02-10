<?php

namespace Teners\LaravelLinkPreview\Contracts;

interface CacheContract
{
    /**
     * Retrieves a cached value associated with a given key.
     *
     * @param string $key The identifier for the cached value.
     * @return mixed|null The cached value, or null if not found.
     */
    public function getCache(string $key): mixed;

    /**
     * Stores a value in the cache with a given key and optional expiry time.
     *
     * @param string $key The identifier for the cached value.
     * @param mixed $value The data to be cached.
     * @param int|null $expiry The time in seconds before the cached value expires (optional).
     */
    public function storeCache(string $key, mixed $value, ?int $expiry);
}
