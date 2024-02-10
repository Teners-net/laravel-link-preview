# Laravel Link Preview
A Laravel package for extracting link previews with customizable parsers, and caching support

[![GitHub license](https://img.shields.io/github/license/Teners-net/laravel-link-preview)](https://github.com/Teners-net/laravel-link-preview/blob/main/LICENSE.md)

<div style="background-color: yellow; color: black; padding: 15px; border-radius: 5px;">
This package is still in active development and is not ready for production use yet.
</div>

## Installation
To install Laravel Link Preview, run the following command in your terminal:

```bash
composer require teners/laravel-link-preview
```

Publish the package configuration file
```bash
php artisan vendor:publish --provider="Teners\LaravelLinkPreview\LaravelLinkPreviewServiceProvider" --tag="link-preview-config"
```

## Contents
1. [Use Cases](docs/use-cases.md)
2. [Configuration Options](docs/configuration.md)

## Contributions
Contributions are **welcome** via Pull Requests on [Github](https://github.com/Teners-net/laravel-link-preview).
- Please document any change you made as neccesary in the [README.md](README.md).
- Pleas make only one pull request per feature/fix.
- See below for some ideas on what you can help with here: [Todos](TODO.md)

## Issues
Please report any issue you encounter in using the package through the [Github Issues](https://github.com/Teners-net/laravel-link-preview/issues) tab.


## Contributors

## Credits and License
Laravel-link-preview was created by [Emmanuel Adesina](https://teners.net/) and is licensed under the [MIT license](LICENSE.md).

