<?php

use Illuminate\Support\Facades\Route;
use Teners\LaravelLinkPreview\LinkPreview;

Route::get('link-preview', function () {
    $url = request("url");
    if (!$url) return ;

    return LinkPreview::getPreview($url);
});