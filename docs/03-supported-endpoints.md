# Supported Endpoints

- [Responses](#responses)
- [Endpoints](#endpoints)
  - [Continents](#continents)
  - [Countries](#countries)
- [Select, Include and Filters](#select-include-and-filters)
  - [withSelect](#withselect)
  - [withInclude](#withinclude)
  - [withFilters](#withfilters)
- [Common Methods](#common-methods)
  - [withTimezone](#withtimezone)
  - [withLanguage](#withlanguage)
  - [withCacheTtl](#withcachettl)

## Responses

All successful responses will return an [`<Entity>Item`](05-objects.md#ltentitygtitem) or an [`<Entity>Collection`](05-objects.md#ltentitygtcollection).

One of the differences between an [`<Entity>Item`](05-objects.md#ltentitygtitem) and an [`<Entity>Collection`](05-objects.md#ltentitygtcollection)
is that the [`<Entity>Item`](05-objects.md#ltentitygtitem) `getData()` method will return a single _Entity_ object,
while the [`<Entity>Collection`](05-objects.md#ltentitygtcollection) `getData()` method will return an array of _Entity_ objects.

For example, when requesting a continent by id, the response will be a `ContinentItem` object and the `getData()` method will return a [`Continent`](05-objects.md#continent) object.
The same way that when requesting all continents, the response will be a `ContinentCollection` object and the `getData()` method will return an array of [`Continent`](05-objects.md#continent) objects.
Check the [responses objects](05-objects.md#responses) for more information.

### Pagination

All [`<Entity>Collection`](05-objects.md#ltentitygtcollection) responses have the `getPagination()` method
that returns all the available pagination data.

### Rate Limit

All responses include the `getRateLimit()` method with the current quota usage.
Check the [official documentation](https://docs.sportmonks.com/football/api/rate-limit) for more information.

## Endpoints

### Continents

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/continents)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): ContinentCollection
```

Get all continents:

```php
$continents = $sportMonksFootball->continents()->getAll();

foreach ($continents->getData() as $continent) {
    echo $continent->getName();
}
```

#### `getById`

```php
getById(int $id): ContinentItem
```

Get continent by id:

```php
$continent = $sportMonksFootball->continents()->getById(1);

echo $continent->getData()->getName();
```

### Countries

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/countries)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): CountryCollection
```

Get all countries:

```php
$countries = $sportMonksFootball->countries()->getAll();

foreach ($countries->getData() as $country) {
    echo $country->getName();
}
```

#### `getById`

```php
getById(int $id): CountryItem
```

Get country by id:

```php
$country = $sportMonksFootball->countries()->getById(1);

echo $country->getData()->getName();
```

#### `getBySearchQuery`

```php
getBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): CountryCollection
```

Get countries by search query:

```php
$countries = $sportMonksFootball->countries()->getBySearchQuery('portugal');

foreach ($countries->getData() as $country) {
    echo $country->getName();
}
```

## Select, Include and Filters

#### `withSelect`

#### `withInclude`

#### `withFilters`

## Common Methods

#### `withTimezone`

#### `withLanguage`

```php
withLanguage(string $language): self
```

Makes a request with a different language from the one globally defined in the [configuration](02-configuration.md#language).

// TODO write about where it is available

```php
// TODO
```

#### `withCacheTtl`

```php
withCacheTtl(int $seconds): self
```

Makes a request and saves into cache for the provided duration in seconds. 

If `0` seconds is provided, the request will not be cached.

> **Note**
> Setting cache to `0` seconds will **not** invalidate any existing cache.

// TODO write about default values

Available for all APIs if `cache` is enabled in the [configuration](02-configuration.md#cache).

```php
// TODO
```