<?php

namespace Teners\LaravelLinkPreview\Caches;

use Teners\LaravelLinkPreview\Contracts\CacheContract;
use Teners\LaravelLinkPreview\Models\LinkPreview;

class PackageCache implements CacheContract
{
    /**
     * get the link cache
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
     * Store the link cache
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
