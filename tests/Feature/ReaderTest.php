<?php

use Orchestra\Testbench\TestCase;
use Teners\LaravelLinkPreview\Readers\HttpReader;

class ReaderTest extends TestCase
{
    public function test_http_reader_can_read_link()
    {
        $content = HttpReader::readUrl("teners.net");

        $this->assertObjectHasProperty('body', $content);
        $this->assertObjectHasProperty('content_type', $content);
    }
}
