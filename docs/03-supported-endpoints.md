# Supported Endpoints

- [Responses](#responses)
- [Football Endpoints](#football-endpoints)
  - [Leagues](#leagues)
  - [States](#states)
- [Core Endpoints](#core-endpoints)
  - [Cities](#cities)
  - [Continents](#continents)
  - [Countries](#countries)
  - [Filters](#filters)
  - [Regions](#regions)
  - [Types](#types)
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

## Football Endpoints

### Leagues

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues)
- Cache default max age: `1 hour`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all leagues:

```php
$leagues = $sportMonksFootball->leagues()->getAll();

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getById`

```php
getById(int $id): LeagueItem
```

Get league by id:

```php
$league = $sportMonksFootball->leagues()->getById(1);
echo $league->getData()->getName();
```

#### `getAllLive`

```php
getAllLive(): LeagueCollection
```

Get all leagues currently live:

```php
$leagues = $sportMonksFootball->leagues()->getAllLive();

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getAllByFixtureDate`

```php
getAllByFixtureDate(\DateTimeInterface $date, int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all leagues with fixtures by date:

```php
$leagues = $sportMonksFootball->leagues()->getAllByFixtureDate(new DateTime('today'));

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId, int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all leagues by country id:

```php
$leagues = $sportMonksFootball->leagues()->getAllByCountryId(1);

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all leagues by search query:

```php
$leagues = $sportMonksFootball->leagues()->getAllBySearchQuery('premiership');

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId, int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all current and historical leagues by team id:

```php
$leagues = $sportMonksFootball->leagues()->getAllByTeamId(1);

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

#### `getAllCurrentByTeamId`

```php
getAllCurrentByTeamId(int $teamId, int $page = 1, int $perPage = 25, string $order = 'asc'): LeagueCollection
```

Get all current leagues by team id:

```php
$leagues = $sportMonksFootball->leagues()->getAllCurrentByTeamId(1);

foreach ($leagues->getData() as $league) {
    echo $league->getName();
}
```

### States

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): StateCollection
```

Get all states:

```php
$states = $sportMonksFootball->states()->getAll();

foreach ($states->getData() as $state) {
    echo $state->getName();
}
```

#### `getById`

```php
getById(int $id): StateItem
```

Get state by id:

```php
$state = $sportMonksFootball->states()->getById(1);
echo $state->getData()->getName();
```

## Core Endpoints

### Cities

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/cities)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): CityCollection
```

Get all cities:

```php
$cities = $sportMonksFootball->cities()->getAll();

foreach ($cities->getData() as $city) {
    echo $city->getName();
}
```

#### `getById`

```php
getById(int $id): CityItem
```

Get city by id:

```php
$city = $sportMonksFootball->cities()->getById(1);
echo $city->getData()->getName();
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): CityCollection
```

Get all cities by search query:

```php
$cities = $sportMonksFootball->cities()->getAllBySearchQuery('lisbon');

foreach ($cities->getData() as $city) {
    echo $city->getName();
}
```

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

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): CountryCollection
```

Get all countries by search query:

```php
$countries = $sportMonksFootball->countries()->getAllBySearchQuery('portugal');

foreach ($countries->getData() as $country) {
    echo $country->getName();
}
```

### Filters

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/filters)
- Cache default max age: `1 day`

#### `getAllByEntity`

```php
getAllByEntity(): FilterEntityCollection
```

Get all filters grouped by entity:

```php
$entities = $sportMonksFootball->filters()->getAllByEntity();

foreach ($entities->getData() as $entity) {
    echo $entity->getName();
    
    foreach ($entity->getFilters() as $filter) {
        echo $filter
    }
}
```

### Regions

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/regions)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): RegionCollection
```

Get all regions:

```php
$regions = $sportMonksFootball->regions()->getAll();

foreach ($regions->getData() as $region) {
    echo $region->getName();
}
```

#### `getById`

```php
getById(int $id): RegionItem
```

Get region by id:

```php
$region = $sportMonksFootball->regions()->getById(1);
echo $region->getData()->getName();
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): RegionCollection
```

Get all regions by search query:

```php
$regions = $sportMonksFootball->regions()->getAllBySearchQuery('lisboa');

foreach ($regions->getData() as $region) {
    echo $region->getName();
}
```

### Types

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/types)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): TypeCollection
```

Get all types:

```php
$types = $sportMonksFootball->types()->getAll();

foreach ($types->getData() as $type) {
    echo $type->getName();
}
```

#### `getById`

```php
getById(int $id): TypeItem
```

Get type by id:

```php
$type = $sportMonksFootball->types()->getById(1);

echo $type->getData()->getName();
```

#### `getAllByEntity`

```php
getAllByEntity(): TypeEntityCollection
```

Get all types grouped by entity:

```php
$entities = $sportMonksFootball->types()->getAllByEntity();

foreach ($entities->getData() as $entity) {
    echo $entity->getName();
    
    foreach ($entity->getTypes() as $type) {
        echo $type->getName()
    }
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