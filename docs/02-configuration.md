# Configuration

- [Default Configuration](#default-configuration)
- [Options](#options)
  - [applicationKey](#applicationkey)
  - [timezone](#timezone)
  - [language](#language)
  - [httpClientBuilder](#httpclientbuilder)
  - [cache](#cache)
  - [logger](#logger)
- [Config Object](#config-object)

## Default Configuration

Only the `applicationKey` option is required:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey', // required
        'timezone' => 'UTC',
        'language' => 'en',
        'httpClientBuilder' => new HttpClientBuilder(),
        'cache' => null,
        'logger' => null
    ])
);
```

## Options

### `applicationKey`

Required for all requests. Check the [API Key](01-usage.md#api-key) section for more information.

### `timezone`

Timezone used when retrieving data. 
Check the [official documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/timezone-parameters-on-different-endpoints) for more information.

List of all supported timezones can be found [here](https://www.php.net/manual/en/timezones.php).

Example:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'timezone' => 'Europe/Lisbon'
    ])
);
```

### `language`

Language used when retrieving data.

List of all available languages can be found [here](https://docs.sportmonks.com/football/api/translations-beta) (still in beta).
[Constants](../src/Language/Language.php) are also available.

Example:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Language\Language;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'language' => Language::JAPANESE
    ])
);
```

### `httpClientBuilder`

Configure a PSR-18 HTTP client and PSR-17 HTTP factory adapters.

By default, and for convenience, this library makes use of the [HTTPlug's Discovery](https://github.com/php-http/discovery) library.
This means that it will automatically find and install a well-known PSR-18 and PSR-17 implementation for you (if one was not found on your project):
- [List of PSR-18 compatible implementations](https://packagist.org/providers/psr/http-client-implementation)
- [List of PSR-17 compatible implementations](https://packagist.org/providers/psr/http-factory-implementation)

If you want to manually provide one, it should look like this:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$httpClient = new Symfony\Component\HttpClient\Psr18Client();
$httpFactory = new Nyholm\Psr7\Factory\Psr17Factory();

// HttpClientBuilder(
//      ?ClientInterface $client = null,
//      ?RequestFactoryInterface $requestFactory = null,
//      ?StreamFactoryInterface $streamFactory = null
// );
$httpClientBuilder = new HttpClientBuilder($httpClient, $httpFactory, $httpFactory);

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'httpClientBuilder' => $httpClientBuilder
    ])
);
```

> **Note**
> All `HttpClientBuilder` parameters are optional.
> If you only pass an HTTP client, an HTTP factory will still be discovered for you.

#### Plugin System

[HTTPlug's plugin system](https://docs.php-http.org/en/latest/plugins/index.html) is also implemented to give you full control of what happens during the request/response workflow.

For example, to attempt to re-send a request in case of failure (service temporarily down because of unreliable connections/servers, etc.), 
the [RetryPlugin](https://docs.php-http.org/en/latest/plugins/retry.html) can be added:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$httpClientBuilder = new HttpClientBuilder();
$httpClientBuilder->addPlugin(
    new \Http\Client\Common\Plugin\RetryPlugin([
        'retries' => 3
    ])
);

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'httpClientBuilder' => $httpClientBuilder
    ])
);
```

You can check their [plugin list](https://docs.php-http.org/en/latest/plugins/index.html) or [create your own](https://docs.php-http.org/en/latest/plugins/build-your-own.html).

> **Note**
> This library already uses HTTPlug's `CachePlugin` and `LoggerPlugin`.
> Re-adding those may lead to an unexpected behaviour.

### `cache`

Configure a PSR-6 cache adapter.

By default, no responses are cached.
To enable cache, you must provide a PSR-6 implementation:
- [List of PSR-6 compatible implementations](https://packagist.org/providers/psr/cache-implementation)

In the example below, a filesystem-based cache is used:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'cache' => $cache
    ])
);
```

#### Cache TTL

// TODO

### `logger`

Configure a PSR-3 logger adapter.

By default, no logs are saved. To enable logs, you must provide a PSR-3 implementation:
- [List of PSR-3 compatible implementations](https://packagist.org/providers/psr/log-implementation)

In the example below, a file-based logger is used:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

$logger = new \Monolog\Logger('sportmonksfootball');
$logger->pushHandler(
    new \Monolog\Handler\StreamHandler(__DIR__ . '/logs/sportmonksfootball.log')
);

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey',
        'logger' => $logger
    ])
);
```

> **Note**
> If a `cache` implementation is configured, cache events will also be logged.

## Config Object

Configuration getters and setters for all options are available to access and change after initialization:

```php
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\OpenWeatherMap;

$sportMonksFootball = new SportMonksFootball(
    new Config([
        'applicationKey' => 'yourappkey'
    ])
);

// Using applicationKey as an example,
// but getters and setters are available for all options
$sportMonksFootball->config()->getApplicationKey();
$sportMonksFootball->config()->setApplicationKey('newappkey');
```

Just take into account that any change will affect any subsequent request globally:

```php
// TODO
```