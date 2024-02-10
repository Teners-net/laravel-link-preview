<?php

namespace Teners\LaravelLinkPreview\Caches;

use Teners\LaravelLinkPreview\Contracts\CacheContract;
use Teners\LaravelLinkPreview\Models\LinkPreview;

class PackageCache implements CacheContract
{
    /**
     * Retrieves a cached value associated with a given key.
     *
     * @param string $key The identifier for the cached value.
     * @return mixed|null The cached value, or null if not found.
     */
    public function getCache(string $url)
    {
        $cachedPreview = LinkPreview::firstWhere('url', $url);

        if ($cachedPreview) {
            return $cachedPreview->toArray();
        }

        return null;
    }

    /**
     * Stores a value in the cache with a given key and optional expiry time.
     *
     * @param string $key The identifier for the cached value.
     * @param mixed $value The data to be cached.
     * @param int|null $expiry The time in seconds before the cached value expires (optional).
     */
    public function storeCache(string $url, mixed $value, ?int $expiry)
    {
        return LinkPreview::updateOrCreate(
            [
                'url' => $url
            ],
            $value
        );
    }
}
