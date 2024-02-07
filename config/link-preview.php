<?php

return [
  /**
   * The default parser to use. Options: 'html', 'custom'.
   * - 'html': Use HTML parsing libraries (e.g., PHP Simple HTML DOM Parser).
   * - 'custom': Implement custom parsers for specific platforms (e.g., YouTube, Vimeo).
   */
  'default-parser' => env('LINK_PREVIEW_DEFAULT_PARSER', 'html'),

  /**
   * Should previews be cached? If true, the package will cache link previews to improve performance.
   */
  'use_cache' => env('LINK_PREVIEW_USE_CACHE', true),

  /**
   * Cache duration in seconds. Set the duration for which link previews should be cached.
   * Default is 1 week (7 days * 24 hours * 60 minutes * 60 seconds).
   */
  'cache_for' => env('LINK_PREVIEW_CACHE_DURATION', 604800),

  /**
   * Enable or disable the use of specific parsers.
   * Specify the parsers you want to enable for link preview generation.
   */
  'enabled_parsers' => [
    'html' => true,
    'youtube' => env('LINK_PREVIEW_PARSER_YOUTUBE', true),
    'vimeo' => env('LINK_PREVIEW_PARSER_VIMEO', true),
    'twitter' => env('LINK_PREVIEW_PARSER_TWITTER', true),
  ],

  /**
   * Default image URL. If a link doesn't provide an image, use this URL as a fallback.
   */
  'default_image' => env('LINK_PREVIEW_DEFAULT_IMAGE', 'https://example.com/default-image.jpg'),
];
