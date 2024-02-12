<?php

use Teners\LaravelLinkPreview\Readers\HttpReader;
use Teners\LaravelLinkPreview\Tests\TestCase;

class ReaderTest extends TestCase
{
    public function test_http_reader_can_read_link()
    {
        $content = HttpReader::readUrl("teners.net");

        $this->assertObjectHasProperty('body', $content);
        $this->assertObjectHasProperty('content_type', $content);
    }
}
