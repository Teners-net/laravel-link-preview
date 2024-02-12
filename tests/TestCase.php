<?php

namespace Teners\LaravelLinkPreview\Tests;

use Orchestra\Testbench\TestCase as TestbenchTestCase;

abstract class TestCase extends TestbenchTestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('link-preview', require __DIR__.'/../config/link-preview.php');
    }
}
