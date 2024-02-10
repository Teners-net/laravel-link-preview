<?php

namespace Teners\LaravelLinkPreview\Tests\Feature;

use InvalidArgumentException;
use Orchestra\Testbench\TestCase;
use Teners\LaravelLinkPreview\LinkPreview;
use Teners\LaravelLinkPreview\Parsers\HtmlParser;
use Teners\LaravelLinkPreview\Readers\HttpReader;

use function PHPUnit\Framework\assertArrayHasKey;

class LinkPreviewTest extends TestCase
{
    public function test_it_throws_invalid_argument_exception_for_invalid_link()
    {
        $this->expectException(InvalidArgumentException::class);
        LinkPreview::getPreview("htt/teners.net");
    }

    public function test_it_does_not_throw_exception_for_valid_link()
    {
        LinkPreview::getPreview("https://teners.net");
        $this->assertTrue(true);
    }

    public function test_can_read_and_parse_link()
    {
        // https://www.youtube.com/watch?v=QfGknavYffw works
        // https://x.com/DAMIADENUGA/status/1755348039533793435 fails

        $reader = HttpReader::readUrl("https://teners.net");
        $preview = HtmlParser::parse($reader);

        assertArrayHasKey('title', $preview);
        assertArrayHasKey('description', $preview);
    }

    public function test_can_get_link_preview()
    {
    }
}