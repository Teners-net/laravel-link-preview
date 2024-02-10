<?php

interface CacheContract
{
    /**
     * get the link cache
     */
    public function getCache(string $key);

    /**
     * Store the link cache
     */
    public function storeCache(string $key, mixed $value, int $expiry);
}