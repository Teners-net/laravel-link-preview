<?php

namespace Teners\LaravelLinkPreview\Contracts;

interface ParserContract
{
    /**
     * Parses HTML content using DOM crawler to extract link preview information.
     *
     * This method extracts various preview elements (title, description, cover, etc.)
     * from the provided HTML content using a defined set of selectors and attributes.
     *
     * @param object $reader An object containing the HTML content to be parsed.
     * @return array An associative array containing extracted preview elements.
     * @throws \Throwable If an error occurs during parsing.
     */
    public static function parse($content): array;
}
