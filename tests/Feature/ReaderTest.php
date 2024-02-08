<?php

use Orchestra\Testbench\TestCase;
use Teners\LaravelLinkPreview\Reader;

class ReaderTest extends TestCase
{
    public function test_it_can_read_link()
    {
        $content = Reader::readurl("teners.net");

        $this->assertObjectHasProperty('body', $content);
        $this->assertObjectHasProperty('content_type', $content);
    }
}
