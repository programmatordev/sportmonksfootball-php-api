# SportMonksFootball PHP API

SportMonksFootball PHP library that provides convenient access to the SportMonks Football API.

Supports [PSR-18 HTTP clients](https://www.php-fig.org/psr/psr-18), [PSR-17 HTTP factories](https://www.php-fig.org/psr/psr-17), [PSR-6 caches](https://www.php-fig.org/psr/psr-6) and [PSR-3 logs](https://www.php-fig.org/psr/psr-3).

## Requirements

- PHP 8.1 or higher.

## API Key

A key is required to be able to make requests to the API.
You must sign up for a [SportMonks account](https://www.sportmonks.com/football-api/) to get one.

## Installation

You can install the library via [Composer](https://getcomposer.org/):

```bash
composer require programmatordev/sportmonksfootball-php-api
```

To use the library, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

## Basic Usage

Simple usage looks like:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

// Initialize
$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey'
    ])
);

// Get all livescores of the current day
$livescores = $sportMonksFootball->livescores()->getAll();
```

## Documentation

- [Usage](docs/01-usage.md)
- [Configuration](docs/02-configuration.md)
- [Supported Endpoints](docs/03-supported-endpoints.md)
  - [Football Endpoints](docs/03-supported-endpoints.md#football-endpoints)
  - [Odds Endpoints](docs/03-supported-endpoints.md#odds-endpoints)
  - [Core Endpoints](docs/03-supported-endpoints.md#core-endpoints)
- [Error Handling](docs/04-error-handling.md)
- [Objects](docs/05-objects.md)

## Contributing

Any form of contribution to improve this library (including requests) will be welcome and appreciated.
Make sure to open a pull request or issue.

## License

This project is licensed under the MIT license.
Please see the [LICENSE](LICENSE) file distributed with this source code for further information regarding copyright and licensing.