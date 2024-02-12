<?php

use Teners\LaravelLinkPreview\Tests\TestCase;

class ConfigTest extends TestCase
{
    function test_it_can_get_config_values()
    {
        $config = config('link-preview');

        $this->assertArrayHasKey('enable_caching', $config);
        $this->assertArrayHasKey('cache_duration', $config);
        $this->assertArrayHasKey('cache_type', $config);
    }
}
