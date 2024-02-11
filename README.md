# Laravel Link Preview
A Laravel package for extracting link previews with customizable parsers, and caching support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/teners/laravel-link-preview.svg?style=flat-square)](https://packagist.org/packages/teners/laravel-link-preview)
[![issues](https://img.shields.io/github/issues/Teners-net/laravel-link-preview?style=flat-square)](https://github.com/Teners-net/laravel-link-preview/issues)
[![stars](https://img.shields.io/github/stars/Teners-net/laravel-link-preview?style=flat-square)](https://github.com/Teners-net/laravel-link-preview/issues)
[![GitHub license](https://img.shields.io/github/license/Teners-net/laravel-link-preview?style=flat-square)](https://github.com/Teners-net/laravel-link-preview/blob/main/LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/teners/laravel-link-preview.svg?style=flat-square)](https://packagist.org/packages/teners/laravel-link-preview)


**This package is still in active development.**

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

## Testing

``` bash
composer test
```

## Credits

- [Emmanuel Adesina](https://github.com/ThePlatinum)

### Contributors

Contributors list will be added here

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
