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

Install the library via [Composer](https://getcomposer.org/):

```bash
composer require programmatordev/sportmonksfootball-php-api
```

## Basic Usage

Simple usage looks like:

```php
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

// initialize
$api = new SportMonksFootball('yourapikey');

// get all livescores of the current day
$livescores = $api->livescores()->getAll();
```
