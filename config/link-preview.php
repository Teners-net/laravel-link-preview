<?php

return [

    /**
     * Determines whether link previews should be cached for improved performance.
     * If true, the package will handle caching based on the configured cache type.
     */
    'enable_caching' => env('LINK_PREVIEW_ENABLE_CACHING', true),

    /**
     * Duration in seconds for which link previews should be cached.
     * Default is 1 week (7 days * 24 hours * 60 minutes * 60 seconds).
     */
    'cache_duration' => env('LINK_PREVIEW_CACHE_DURATION', 604800),

    /**
     * Cache type to use for storing link previews.
     *
     * Options:
     * 'model': Package will use its LinkPreview model to manage caching.
     * 'app': Package will use the default cache system configured in the Laravel project.
     *
     * COMING SOON:
     * 'global': a redix server maintained cache with CDN
     */
    'cache_type' => env('LINK_PREVIEW_CACHE_TYPE', 'app'),

    /**
     * Enable or disable specific parsers for link preview generation.
     *
     * Aside the default HTML parser you can specify
     * other parsers you want to enable.
     *
     * COMING_SOON
     */
    'enabled_parsers' => [
        // 'youtube' => env('LINK_PREVIEW_PARSER_YOUTUBE', false),
        // 'vimeo' => env('LINK_PREVIEW_PARSER_VIMEO', false),
        // 'twitter' => env('LINK_PREVIEW_PARSER_TWITTER', false),
    ]
];
