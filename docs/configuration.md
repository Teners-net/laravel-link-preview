# Configuration Options

The `link-preview.php` configuration file in your Laravel application's `config` directory contains various options that you can customize to tailor the behavior of the Laravel Link Preview package to your needs.

## `enable_caching`

- **Description**: Enable or disable caching of link previews.
- **Type**: Boolean
- **Default**: `true`

## `cache_duration`

- **Description**: Set the duration in seconds for which link previews should be cached.
- **Type**: Integer
- **Default**: `604800` (1 week)

## `cache_type`

- **Description**: Choose the type of cache type to use for storing link previews.
- **Type**: String
- **options**: `'model'`, `'app'`
- **Default**: `'model'`


### How to Customize Configuration

To customize these options, you can modify the `link-preview.php` file located in the `config` directory of your Laravel application. After making changes, be sure to clear the config cache:

```bash
php artisan config:cache
