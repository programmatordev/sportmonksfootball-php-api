# Using SportMonksFootball PHP API

- [Requirements](#requirements)
- [API Key](#api-key)
- [Installation](#installation)
- [Basic Usage](#basic-usage)

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
