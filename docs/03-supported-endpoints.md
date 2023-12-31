# Supported Endpoints

- [Responses](#responses)
- [Football Endpoints](#football-endpoints)
  - [Coaches](#coaches)
  - [Commentaries](#commentaries)
  - [Fixtures](#fixtures)
  - [Leagues](#leagues)
  - [Livescores](#livescores)
  - [Players](#players)
  - [Referees](#referees)
  - [Rivals](#rivals)
  - [Rounds](#rounds)
  - [Schedules](#schedules)
  - [Seasons](#seasons)
  - [Stages](#stages)
  - [Standings](#standings)
  - [States](#states)
  - [Statistics](#statistics)
  - [Teams](#teams)
  - [Team Squads](#team-squads)
  - [Topscorers](#topscorers)
  - [Transfers](#transfers)
  - [TV Stations](#tv-stations)
  - [Venues](#venues)
- [Odds Endpoints](#odds-endpoints)
  - [Bookmakers](#bookmakers)
  - [Markets](#markets)
  - [Pre-match Odds](#pre-match-odds)
- [Core Endpoints](#core-endpoints)
  - [Cities](#cities)
  - [Continents](#continents)
  - [Countries](#countries)
  - [Filters](#filters)
  - [Regions](#regions)
  - [Timezones](#timezones)
  - [Types](#types)
- [Select, Include and Filters](#select-include-and-filters)
  - [withSelect](#withselect)
  - [withInclude](#withinclude)
  - [withFilters](#withfilters)
- [Timezone, Language and Cache TTL](#timezone-language-and-cache-ttl)
  - [withTimezone](#withtimezone)
  - [withLanguage](#withlanguage)
  - [withCacheTtl](#withcachettl)

## Responses

All successful responses will return an [`<Entity>Item`](05-objects.md#entityitem) or an [`<Entity>Collection`](05-objects.md#entitycollection).

One of the differences between an [`<Entity>Item`](05-objects.md#entityitem) and an [`<Entity>Collection`](05-objects.md#entitycollection)
is that the [`<Entity>Item`](05-objects.md#entityitem) `getData()` method will return a single _Entity_ object,
while the [`<Entity>Collection`](05-objects.md#entitycollection) `getData()` method will return an array of _Entity_ objects.

For example, when requesting a fixture by id, the response will be a `FixtureItem` object and the `getData()` method will return a [`Fixture`](05-objects.md#fixture) object.
The same way that when requesting all fixtures, the response will be a `FixtureCollection` object and the `getData()` method will return an array of [`Fixture`](05-objects.md#fixture) objects.
Check the [responses objects](05-objects.md#response-objects) for more information.

```php
// Returns a FixtureItem object
$fixtureItem = $sportMonksFootball->fixtures()->getById(1);
// Returns a Fixture object
$fixture = $fixtureItem->getData();
echo $fixture->getName();

// Returns a FixtureCollection object
$fixtureCollection = $sportMonksFootball->fixtures()->getAll();
// Returns an array of Fixture objects
$fixtures = $fixtureCollection->getData();
foreach ($fixtures as $fixture) {
    echo $fixture->getName();
}
```

### Pagination

[`<Entity>Collection`](05-objects.md#entitycollection) responses that contain pagination data (not all of them have)
will be accessible through the `getPagination()` method:

```php
$fixtures = $sportMonksFootball->fixtures()->getAll();

echo $fixtures->getPagination()->getCount();
echo $fixtures->getPagination()->getPerPage();
echo $fixtures->getPagination()->getCurrentPage();
echo $fixtures->getPagination()->getNextPage();
echo $fixtures->getPagination()->hasMore();
```

Endpoints that support pagination, will always have a `page`, `perPage` and `order` parameters:

```php
// Returns page 10 with 50 fixtures per page in descending order
$fixtures = $sportMonksFootball->fixtures()->getAll(page: 10, perPage: 50, order: 'desc')->getData();
```

### Rate Limit

All responses include the `getRateLimit()` method with the current quota usage.
Check the [official documentation](https://docs.sportmonks.com/football/api/rate-limit) for more information.

```php
$fixture = $sportMonksFootball->fixtures()->getById(1);

echo $fixture->getRateLimit()->getRemainingNumRequests();
echo $fixture->getRateLimit()->getSecondsToReset();
echo $fixture->getRateLimit()->getRequestedEntity();
```

### Timezone

All responses include the `getTimezone()` method with the timezone of the given data.
By default, all responses will be in the `UTC` timezone.

To request data in a different timezone for all requests, check the [configuration section](02-configuration.md#timezone).
For a single endpoint, check the [`withTimezone` section](#withtimezone).

```php
$fixture = $sportMonksFootball->fixtures()->getById(1);

echo $fixture->getTimezone(); // UTC
```

## Football Endpoints

### Coaches

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches)
- Cache default max age: `1 day`
  - `getAllLastUpdated` cache max age: `1 hour`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): CoachCollection
```

Get all coaches:

```php
$coaches = $sportMonksFootball->coaches()->getAll();

foreach ($coaches->getData() as $coach) {
    echo $coach->getDisplayName();
}
```

#### `getById`

```php
getById(int $id): CoachItem
```

Get coach by id:

```php
$coach = $sportMonksFootball->coaches()->getById(1);
echo $coach->getData()->getDisplayName();
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId, int $page = 1, int $perPage = 25, string $order = 'asc'): CoachCollection
```

Get all coaches by country id:

```php
$coaches = $sportMonksFootball->coaches()->getAllByCountryId(1);

foreach ($coaches->getData() as $coach) {
    echo $coach->getDisplayName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): CoachCollection
```

Get all coaches by search query:

```php
$coaches = $sportMonksFootball->coaches()->getAllBySearchQuery('amorim');

foreach ($coaches->getData() as $coach) {
    echo $coach->getDisplayName();
}
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): CoachCollection
```

Get all coaches that received updates in the last couple of hours:

```php
$coaches = $sportMonksFootball->coaches()->getAllLastUpdated();

foreach ($coaches->getData() as $coach) {
    echo $coach->getDisplayName();
}
```

> **Note**
> Cache max age is forced to `1 hour` on this endpoint.

### Commentaries

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries)
- Cache default max age: `1 minute`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): CommentaryCollection
```

Get all commentaries:

```php
$commentaries = $sportMonksFootball->commentaries()->getAll();

foreach ($commentaries->getData() as $commentary) {
    echo $commentary->getComment();
}
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId): CommentaryCollection
```

Get all commentaries by fixture id:

```php
$commentaries = $sportMonksFootball->commentaries()->getAllByFixtureId(1);

foreach ($commentaries->getData() as $commentary) {
    echo $commentary->getComment();
}
```

### Fixtures

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures)
- Cache default max age: `1 hour`
  - `getAllLastUpdated` cache max age: `10 seconds`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all fixtures:

```php
$fixtures = $sportMonksFootball->fixtures()->getAll();

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getById`

```php
getById(int $id): FixtureItem
```

Get fixture by id:

```php
$fixture = $sportMonksFootball->fixtures()->getById(1);
echo $fixture->getData()->getName();
```

#### `getAllByMultipleIds`

```php
getAllByMultipleIds(array $ids): FixtureCollection
```

Get all fixtures by multiple ids:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllByMultipleIds([1, 2, 3]);

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllByDate`

```php
getAllByDate(\DateTimeInterface $date, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all fixtures by date:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllByDate(new DateTime('today'));

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllByDateRange`

```php
getAllByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all fixtures by date range:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllByDateRange(new DateTime('today'), new DateTime('+7 days'));

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllByTeamIdAndDateRange`

```php
getAllByTeamIdAndDateRange(int $teamId, \DateTimeInterface $startDate, \DateTimeInterface $endDate, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all fixtures by team id and date range:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllByTeamIdAndDateRange(1, new DateTime('today'), new DateTime('+7 days'));

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllByHeadToHead`

```php
getAllByHeadToHead(int $teamIdOne, int $teamIdTwo): FixtureCollection
```

Get all fixtures between two teams:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllByHeadToHead(1, 2);

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all fixtures by search query:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllBySearchQuery('sporting');

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllUpcomingByMarketId`

```php
getAllUpcomingByMarketId(int $marketId, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all upcoming fixtures by market id:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllUpcomingByMarketId(1);

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllUpcomingByTvStationId`

```php
getAllUpcomingByTvStationId(int $tvStationId, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all upcoming fixtures by tv station id:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllUpcomingByTvStationId(1);

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllPastByTvStationId`

```php
getAllPastByTvStationId(int $tvStationId, int $page = 1, int $perPage = 25, string $order = 'asc'): FixtureCollection
```

Get all past fixtures by tv station id:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllPastByTvStationId(1);

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): FixtureCollection
```

Get all last updated fixtures:

```php
$fixtures = $sportMonksFootball->fixtures()->getAllLastUpdated();

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

> **Note**
> Cache max age is forced to `10 seconds` on this endpoint.

### Leagues

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues)
- Cache default max age: `1 hour`
  - `getAllLive` cache max age: `1 minute`

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

> **Note**
> Cache max age is forced to `1 minute` on this endpoint.

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

### Livescores

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores)
- Cache default max age: `1 minute`
  - `getAllLastUpdated` cache max age: `10 seconds`

#### `getAll`

```php
getAll(): FixtureCollection
```

Get all fixtures of the current day:

```php
$fixtures = $sportMonksFootball->livescores()->getAll();

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllInplay`

```php
getAllInplay(): FixtureCollection
```

Get all fixtures that are already live, that will start within 15 minutes or that have finished in the past 15 minutes:

```php
$fixtures = $sportMonksFootball->livescores()->getAllInplay();

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): FixtureCollection
```

Get all fixtures that received updates in the last 10 seconds:

```php
$fixtures = $sportMonksFootball->livescores()->getAllLastUpdated();

foreach ($fixtures->getData() as $fixture) {
    echo $fixture->getName();
}
```

> **Note**
> Cache max age is forced to `10 seconds` on this endpoint.

### Players

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players)
- Cache default max age: `1 day`
  - `getAllLastUpdated` cache max age: `1 hour`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): PlayerCollection
```

Get all players:

```php
$players = $sportMonksFootball->players()->getAll();

foreach ($players->getData() as $player) {
    echo $player->getDisplayName();
}
```

#### `getById`

```php
getById(int $id): PlayerItem
```

Get player by id:

```php
$player = $sportMonksFootball->players()->getById(1);
echo $player->getData()->getDisplayName();
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId, int $page = 1, int $perPage = 25, string $order = 'asc'): PlayerCollection
```

Get all players by country id:

```php
$players = $sportMonksFootball->players()->getAllByCountryId(1);

foreach ($players->getData() as $player) {
    echo $player->getDisplayName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): PlayerCollection
```

Get all players by search query:

```php
$players = $sportMonksFootball->players()->getAllBySearchQuery('esgaio');

foreach ($players->getData() as $player) {
    echo $player->getDisplayName();
}
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): PlayerCollection
```

Get all players that received updates in the last couple of hours:

```php
$players = $sportMonksFootball->players()->getAllLastUpdated();

foreach ($players->getData() as $player) {
    echo $player->getDisplayName();
}
```

> **Note**
> Cache max age is forced to `1 hour` on this endpoint.

### Referees

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): RefereeCollection
```

Get all referees:

```php
$referees = $sportMonksFootball->referees()->getAll();

foreach ($referees->getData() as $referee) {
    echo $referee->getDisplayName();
}
```

#### `getById`

```php
getById(int $id): RefereeItem
```

Get referee by id:

```php
$referee = $sportMonksFootball->referees()->getById(1);
echo $referee->getData()->getDisplayName();
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId, int $page = 1, int $perPage = 25, string $order = 'asc'): RefereeCollection
```

Get all referees by country id:

```php
$referees = $sportMonksFootball->referees()->getAllByCountryId(1);

foreach ($referees->getData() as $referee) {
    echo $referee->getDisplayName();
}
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId, int $page = 1, int $perPage = 25, string $order = 'asc'): RefereeCollection
```

Get all referees by season id:

```php
$referees = $sportMonksFootball->referees()->getAllBySeasonId(1);

foreach ($referees->getData() as $referee) {
    echo $referee->getDisplayName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): RefereeCollection
```

Get all referees by search query:

```php
$referees = $sportMonksFootball->referees()->getAllBySearchQuery('name');

foreach ($referees->getData() as $referee) {
    echo $referee->getDisplayName();
}
```

### Rivals

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): RivalCollection
```

Get all rivals:

```php
$rivals = $sportMonksFootball->rivals()->getAll();

foreach ($rivals->getData() as $rival) {
    echo $rival->getRivalId();
}
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId): RivalCollection
```

Get all rivals by team id:

```php
$rivals = $sportMonksFootball->rivals()->getAllByTeamId(1);

foreach ($rivals->getData() as $rival) {
    echo $rival->getRivalId();
}
```

### Rounds

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): RoundCollection
```

Get all rounds:

```php
$rounds = $sportMonksFootball->rounds()->getAll();

foreach ($rounds->getData() as $round) {
    echo $round->getName();
}
```

#### `getById`

```php
getById(int $id): RoundItem
```

Get round by id:

```php
$round = $sportMonksFootball->rounds()->getById(1);
echo $round->getData()->getName();
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): RoundCollection
```

Get all rounds by season id:

```php
$rounds = $sportMonksFootball->rounds()->getAllBySeasonId(1);

foreach ($rounds->getData() as $round) {
    echo $round->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): RoundCollection
```

Get all rounds by search query:

```php
$rounds = $sportMonksFootball->rounds()->getAllBySearchQuery('30');

foreach ($rounds->getData() as $round) {
    echo $round->getName();
}
```

### Schedules

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules)
- Cache default max age: `1 hour`

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): StageCollection
```

Get complete season schedule by season id:

```php
$schedule = $sportMonksFootball->schedules()->getAllBySeasonId(1);

foreach ($schedule->getData() as $stage) {
    echo $stage->getName();
    
    foreach ($stage->getRounds() as $round) {
        echo $round->getName();
        
        foreach ($round->getFixtures() as $fixture) {
            echo $fixture->getName();
        }
    }
}
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId): StageCollection
```

Get complete schedule for all active seasons by team id:

```php
$schedule = $sportMonksFootball->schedules()->getAllByTeamId(1);

foreach ($schedule->getData() as $stage) {
    echo $stage->getName();
    
    foreach ($stage->getRounds() as $round) {
        echo $round->getName();
        
        foreach ($round->getFixtures() as $fixture) {
            echo $fixture->getName();
        }
    }
}
```

#### `getAllBySeasonIdAndTeamId`

```php
getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): StageCollection
```

Get complete season schedule for one team by season id and team id:

```php
$schedule = $sportMonksFootball->schedules()->getAllBySeasonIdAndTeamId(1, 1);

foreach ($schedule->getData() as $stage) {
    echo $stage->getName();
    
    foreach ($stage->getRounds() as $round) {
        echo $round->getName();
        
        foreach ($round->getFixtures() as $fixture) {
            echo $fixture->getName();
        }
    }
}
```

### Seasons

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): SeasonCollection
```

Get all seasons:

```php
$seasons = $sportMonksFootball->seasons()->getAll();

foreach ($seasons->getData() as $season) {
    echo $season->getName();
}
```

#### `getById`

```php
getById(int $id): SeasonItem
```

Get season by id:

```php
$seasons = $sportMonksFootball->seasons()->getById(1);
echo $season->getData()->getName();
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId): SeasonCollection
```

Get all seasons by team id:

```php
$seasons = $sportMonksFootball->seasons()->getAllByTeamId(1);

foreach ($seasons->getData() as $season) {
    echo $season->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): SeasonCollection
```

Get all seasons by search query:

```php
$seasons = $sportMonksFootball->seasons()->getAllBySearchQuery('2023/2024');

foreach ($seasons->getData() as $season) {
    echo $season->getName();
}
```

### Stages

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): StageCollection
```

Get all stages:

```php
$stages = $sportMonksFootball->stages()->getAll();

foreach ($stages->getData() as $stage) {
    echo $stage->getName();
}
```

#### `getById`

```php
getById(int $id): StageItem
```

Get stage by id:

```php
$stage = $sportMonksFootball->stages()->getById(1);
echo $stage->getData()->getName();
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): StageCollection
```

Get all stages by season id:

```php
$stages = $sportMonksFootball->stages()->getAllBySeasonId(1);

foreach ($stages->getData() as $stage) {
    echo $stage->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): StageCollection
```

Get all stages by search query:

```php
$stages = $sportMonksFootball->stages()->getAllBySearchQuery('champions');

foreach ($stages->getData() as $stage) {
    echo $stage->getName();
}
```

### Standings

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings)
- Cache default max age: `1 hour`
  - `getAllLiveByLeagueId` cache max age: `1 minute`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): StandingCollection
```

Get all standings:

```php
$standings = $sportMonksFootball->standings()->getAll();

foreach ($standings->getData() as $standing) {
    echo $standing->getPosition();
    echo $standing->getPoints();
}
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): StandingCollection
```

Get all standings by season id:

```php
$standings = $sportMonksFootball->standings()->getAllBySeasonId(1);

foreach ($standings->getData() as $standing) {
    echo $standing->getPosition();
    echo $standing->getPoints();
}
```

#### `getAllCorrectionsBySeasonId`

```php
getAllCorrectionsBySeasonId(int $seasonId): StandingCorrectionCollection
```

Get all standing corrections by season id:

```php
$standingCorrections = $sportMonksFootball->standings()->getAllCorrectionsBySeasonId(1);

foreach ($standingCorrections->getData() as $standingCorrection) {
    echo $standingCorrection->getValue();
    echo $standingCorrection->getCalcType();
}
```

#### `getAllByRoundId`

```php
getAllByRoundId(int $roundId): StandingCollection
```

Get all standings by round id:

```php
$standings = $sportMonksFootball->standings()->getAllByRoundId(1);

foreach ($standings->getData() as $standing) {
    echo $standing->getPosition();
    echo $standing->getPoints();
}
```

#### `getAllLiveByLeagueId`

```php
getAllLiveByLeagueId(int $leagueId): StandingCollection
```

Get all live standings by league id:

```php
$standings = $sportMonksFootball->standings()->getAllLiveByLeagueId(1);

foreach ($standings->getData() as $standing) {
    echo $standing->getPosition();
    echo $standing->getPoints();
}
```

> **Note**
> Cache max age is forced to `1 minute` on this endpoint.

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

### Statistics

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics)
- Cache default max age: `1 day`

#### `getAllByPlayerId`

```php
getAllByPlayerId(int $playerId, int $page = 1, int $perPage = 25, string $order = 'asc'): PlayerStatisticCollection
```

Get all statistics by player id per season:

```php
$statistics = $sportMonksFootball->statistics()->getAllByPlayerId(1);

foreach ($statistics->getData() as $statistic) {
    foreach ($statistic->getDetails() as $detail) {
        print_r($detail->getValue());
    }
}
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId, int $page = 1, int $perPage = 25, string $order = 'asc'): TeamStatisticCollection
```

Get all statistics by team id per season:

```php
$statistics = $sportMonksFootball->statistics()->getAllByTeamId(1);

foreach ($statistics->getData() as $statistic) {
    foreach ($statistic->getDetails() as $detail) {
        print_r($detail->getValue());
    }
}
```

#### `getAllByCoachId`

```php
getAllByCoachId(int $coachId, int $page = 1, int $perPage = 25, string $order = 'asc'): CoachStatisticCollection
```

Get all statistics by coach id per season:

```php
$statistics = $sportMonksFootball->statistics()->getAllByCoachId(1);

foreach ($statistics->getData() as $statistic) {
    foreach ($statistic->getDetails() as $detail) {
        print_r($detail->getValue());
    }
}
```

#### `getAllByRefereeId`

```php
getAllByRefereeId(int $refereeId, int $page = 1, int $perPage = 25, string $order = 'asc'): RefereeStatisticCollection
```

Get all statistics by referee id per season:

```php
$statistics = $sportMonksFootball->statistics()->getAllByRefereeId(1);

foreach ($statistics->getData() as $statistic) {
    foreach ($statistic->getDetails() as $detail) {
        print_r($detail->getValue());
    }
}
```

#### `getAllByStageId`

```php
getAllByStageId(int $stageId, int $page = 1, int $perPage = 25, string $order = 'asc'): StatisticCollection
```

Get all statistics by stage id:

```php
$statistics = $sportMonksFootball->statistics()->getAllByStageId(1);

foreach ($statistics->getData() as $statistic) {
    print_r($statistic->getValue());
}
```

#### `getAllByRoundId`

```php
getAllByRoundId(int $roundId, int $page = 1, int $perPage = 25, string $order = 'asc'): StatisticCollection
```

Get all statistics by round id:

```php
$statistics = $sportMonksFootball->statistics()->getAllByRoundId(1);

foreach ($statistics->getData() as $statistic) {
    print_r($statistic->getValue());
}
```

### Teams

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): TeamCollection
```

Get all teams:

```php
$teams = $sportMonksFootball->teams()->getAll();

foreach ($teams->getData() as $team) {
    echo $team->getName();
}
```

#### `getById`

```php
getById(int $id): TeamItem
```

Get team by id:

```php
$team = $sportMonksFootball->teams()->getById(1);
echo $team->getData()->getName();
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId, int $page = 1, int $perPage = 25, string $order = 'asc'): TeamCollection
```

Get all teams by country id:

```php
$teams = $sportMonksFootball->teams()->getAllByCountryId(1);

foreach ($teams->getData() as $team) {
    echo $team->getName();
}
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): TeamCollection
```

Get all teams by season id:

```php
$teams = $sportMonksFootball->teams()->getAllBySeasonId(1);

foreach ($teams->getData() as $team) {
    echo $team->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): TeamCollection
```

Get all teams by search query:

```php
$teams = $sportMonksFootball->teams()->getAllBySearchQuery('sporting');

foreach ($teams->getData() as $team) {
    echo $team->getName();
}
```

### Team Squads

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads)
- Cache default max age: `1 day`

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId): TeamSquadCollection
```

Get complete team squad by team id:

```php
$squad = $sportMonksFootball->teamSquads()->getAllByTeamId(1);

foreach ($squad->getData() as $player) {
    echo $player->getPlayerId();
}
```
#### `getAllExtendedByTeamId`

```php
getAllExtendedByTeamId(int $teamId): PlayerCollection
```

Get complete team squad entried based on the current season by team id:

```php
$squad = $sportMonksFootball->teamSquads()->getAllExtendedByTeamId(1);

foreach ($squad->getData() as $player) {
    echo $player->getName();
}
```

#### `getAllBySeasonIdAndTeamId`

```php
getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): TeamSquadCollection
```

Get complete team squad of one team by season id and team id:

```php
$squad = $sportMonksFootball->teamSquads()->getAllBySeasonIdAndTeamId(1, 1);

foreach ($squad->getData() as $player) {
    echo $player->getPlayerId();
}
```

### Topscorers

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers)
- Cache default max age: `1 day`

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId, int $page = 1, int $perPage = 25, string $order = 'asc'): SeasonCollection
```

Get all topscorers by season id:

```php
$topscorers = $sportMonksFootball->topscorers()->getAllBySeasonId(1);

foreach ($topscorers->getData() as $topscorer) {
    echo $topscorer->getTotal();
}
```

#### `getAllByStageId`

```php
getAllByStageId(int $stageId, int $page = 1, int $perPage = 25, string $order = 'asc'): SeasonCollection
```

Get all topscorers by stage id:

```php
$topscorers = $sportMonksFootball->topscorers()->getAllByStageId(1);

foreach ($topscorers->getData() as $topscorer) {
    echo $topscorer->getTotal();
}
```

### Transfers

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers)
- Cache default max age: `1 hour`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): TransferCollection
```

Get all transfers:

```php
$transfers = $sportMonksFootball->transfers()->getAll();

foreach ($transfers->getData() as $transfer) {
    echo $transfer->getPlayerId();
}
```

#### `getById`

```php
getById(int $id): TransferItem
```

Get transfer by id:

```php
$transfer = $sportMonksFootball->transfers()->getById(1);
echo $transfer->getData()->getPlayerId();
```

#### `getAllLatest`

```php
getAllLatest(int $page = 1, int $perPage = 25, string $order = 'desc'): TransferCollection
```

Get the latest transfers:

```php
$transfers = $sportMonksFootball->transfers()->getAllLatest();

foreach ($transfers->getData() as $transfer) {
    echo $transfer->getPlayerId();
}
```

#### `getAllByDateRange`

```php
getAllByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate, int $page = 1, int $perPage = 25, string $order = 'asc'): TransferCollection
```

Get all transfers by date range:

```php
$transfers = $sportMonksFootball->transfers()->getAllByDateRange(new DateTime('-7 days'), new DateTime('today'));

foreach ($transfers->getData() as $transfer) {
    echo $transfer->getPlayerId();
}
```

#### `getAllByTeamId`

```php
getAllByTeamId(int $teamId, int $page = 1, int $perPage = 25, string $order = 'asc'): TransferCollection
```

Get all transfers by team id:

```php
$transfers = $sportMonksFootball->transfers()->getAllByTeamId(1);

foreach ($transfers->getData() as $transfer) {
    echo $transfer->getPlayerId();
}
```

#### `getAllByPlayerId`

```php
getAllByPlayerId(int $playerId, int $page = 1, int $perPage = 25, string $order = 'asc'): TransferCollection
```

Get all transfers by player id:

```php
$transfers = $sportMonksFootball->transfers()->getAllByPlayerId(1);

foreach ($transfers->getData() as $transfer) {
    echo $transfer->getPlayerId();
}
```

### TV Stations

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): TvStationCollection
```

Get all tv stations:

```php
$tvStations = $sportMonksFootball->tvStations()->getAll();

foreach ($tvStations->getData() as $tvStation) {
    echo $tvStation->getName();
}
```

#### `getById`

```php
getById(int $id): TvStationItem
```

Get tv station by id:

```php
$tvStations = $sportMonksFootball->tvStations()->getById(1);
echo $tvStation->getData()->getName();
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId): TvStationCollection
```

Get all tv stations by fixture id:

```php
$tvStations = $sportMonksFootball->tvStations()->getAllByFixtureId(1);

foreach ($tvStations->getData() as $tvStation) {
    echo $tvStation->getName();
}
```

### Venues

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): VenueCollection
```

Get all venues:

```php
$venues = $sportMonksFootball->venues()->getAll();

foreach ($venues->getData() as $venue) {
    echo $venue->getName();
}
```

#### `getById`

```php
getById(int $id): VenueItem
```

Get venue by id:

```php
$venue = $sportMonksFootball->venues()->getById(1);
echo $venue->getData()->getName();
```

#### `getAllBySeasonId`

```php
getAllBySeasonId(int $seasonId): VenueCollection
```

Get all venues by season id:

```php
$venues = $sportMonksFootball->venues()->getAllBySeasonId(1);

foreach ($venues->getData() as $venue) {
    echo $venue->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): VenueCollection
```

Get all venues by search query:

```php
$venues = $sportMonksFootball->venues()->getAllBySearchQuery('alvalade');

foreach ($venues->getData() as $venue) {
    echo $venue->getName();
}
```

## Odds Endpoints

### Bookmakers

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): BookmakerCollection
```

Get all bookmakers:

```php
$bookmakers = $sportMonksFootball->bookmakers()->getAll();

foreach ($bookmakers->getData() as $bookmaker) {
    echo $bookmaker->getName();
}
```

#### `getById`

```php
getById(int $id): BookmakerItem
```

Get bookmaker by id:

```php
$bookmaker = $sportMonksFootball->bookmakers()->getById(1);
echo $bookmaker->getData()->getName();
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId, int $page = 1, int $perPage = 25, string $order = 'asc'): BookmakerCollection
```

Get all bookmakers by fixture id:

```php
$bookmakers = $sportMonksFootball->bookmakers()->getAllByFixtureId(1);

foreach ($bookmakers->getData() as $bookmaker) {
    echo $bookmaker->getName();
}
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): BookmakerCollection
```

Get all bookmakers by search query:

```php
$bookmakers = $sportMonksFootball->bookmakers()->getAllBySearchQuery('bet');

foreach ($bookmakers->getData() as $bookmaker) {
    echo $bookmaker->getName();
}
```

### Markets

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): MarketCollection
```

Get all markets:

```php
$markets = $sportMonksFootball->markets()->getAll();

foreach ($markets->getData() as $market) {
    echo $market->getName();
}
```

#### `getById`

```php
getById(int $id): MarketItem
```

Get market by id:

```php
$market = $sportMonksFootball->markets()->getById(1);
echo $market->getData()->getName();
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query, int $page = 1, int $perPage = 25, string $order = 'asc'): MarketCollection
```

Get all markets by search query:

```php
$markets = $sportMonksFootball->markets()->getAllBySearchQuery('goal');

foreach ($markets->getData() as $market) {
    echo $market->getName();
}
```

### Pre-match Odds

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/pre-match-odds)
- Cache default max age: `1 hour`
  - `getAllLastUpdated` cache max age: `10 seconds`

#### `getAll`

```php
getAll(int $page = 1, int $perPage = 25, string $order = 'asc'): OddCollection
```

Get all pre-match odds:

```php
$odds = $sportMonksFootball->preMatchOdds()->getAll();

foreach ($odds->getData() as $odd) {
    echo $odd->getMarketDescription();
}
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId): OddCollection
```

Get all pre-match odds by fixture id:

```php
$odds = $sportMonksFootball->preMatchOdds()->getAllByFixtureId(1);

foreach ($odds->getData() as $odd) {
    echo $odd->getMarketDescription();
}
```

#### `getAllByFixtureIdAndBookmakerId`

```php
getAllByFixtureIdAndBookmakerId(int $fixtureId, int bookmakerId): OddCollection
```

Get all pre-match odds by fixture id and bookmaker id:

```php
$odds = $sportMonksFootball->preMatchOdds()->getAllByFixtureIdAndBookmakerId(1, 1);

foreach ($odds->getData() as $odd) {
    echo $odd->getMarketDescription();
}
```

#### `getAllByFixtureIdAndMarketId`

```php
getAllByFixtureIdAndMarketId(int $fixtureId, int marketId): OddCollection
```

Get all pre-match odds by fixture id and market id:

```php
$odds = $sportMonksFootball->preMatchOdds()->getAllByFixtureIdAndMarketId(1, 1);

foreach ($odds->getData() as $odd) {
    echo $odd->getMarketDescription();
}
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): OddCollection
```

Get all last updated pre-match odds:

```php
$odds = $sportMonksFootball->preMatchOdds()->getAllLastUpdated();

foreach ($odds->getData() as $odd) {
    echo $odd->getMarketDescription();
}
```

> **Note**
> Cache max age is forced to `10 seconds` on this endpoint.

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

### Timezones

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/timezones)
- Cache default max age: `1 day`

#### `getAll`

```php
getAll(): TimezoneCollection
```

Get all timezones:

```php
$timezones = $sportMonksFootball->timezones()->getAll();

foreach ($timezones->getData() as $timezone) {
    echo $timezone;
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

```php
/** @param string[] $select **/
withSelect(array $select): self
```

It is possible to request only specific fields on entities and on includes.
The advantage of selecting specific fields is that it reduces the response speed in mainly large responses. 
In addition to reducing response time, the response size is also reduced.

For selecting fields on includes, check the [`withInclude`](#withinclude) section.

```php
// Get fixture with fields "name" and "starting_at" only
$fixture = $sportMonksFootball->fixtures()
    ->withSelect(['name', 'starting_at'])
    ->getById(1);
```

#### `withInclude`

```php
/** @param string[] $include **/
withInclude(array $include): self
```

Includes allow to enrich the response with relational data.
This means that it is possible to request a fixture and have the venue data in the same response without any additional requests.
To check what includes ara available per endpoint, check the [official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints).

```php
// Get fixture with "venue" and "participants" (teams) data
$fixture = $sportMonksFootball->fixtures()
    ->withInclude(['venue', 'participants'])
    ->getById(1);

// It is also possible to nest includes
// This will return venue data and country data inside the venue
$fixture = $sportMonksFootball->fixtures()
    ->withInclude(['venue.country'])
    ->getById(1);
```

To better understand how it works, check the [official documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/enrich-your-response).

To select fields in includes (similar to the [`withSelect`](#withselect)), you can do the following:

```php
// Get fixture with "venue" data with fields "name" and "city_name" only
$fixture = $sportMonksFootball->fixtures()
    ->withInclude(['venue:name,city_name'])
    ->getById(1);
```

#### `withFilters`

```php
/** @param array<string, string|int> $filters **/
withFilters(array $filters): self
```

Filters are useful to make conditional requests. For example, get fixture events that are only goals:

```php
// Get fixture with "events" that are only goals, own goals or penalties.
$fixture = $sportMonksFootball->fixtures()
    ->withInclude(['events'])
    ->withFilters(['eventTypes' => '14,15,16'])
    ->getById(1);
```

To better understand how it works, check the [official documentation](https://docs.sportmonks.com/football/api/request-options/filtering).

## Timezone, Language and Cache TTL

#### `withTimezone`

```php
withTimezone(string $timezone): self
```

Makes a request with a different timezone from the one globally defined in the [configuration](02-configuration.md#timezone).

Only available for endpoints that contain Fixtures or Livescores.
Check the [official documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/timezone-parameters-on-different-endpoints) for more information.

```php
// Get all fixtures in the Europe/Lisbon timezone
$fixtures = $sportMonksFootball->fixtures()
    ->withTimezone('Europe/Lisbon')
    ->getAll();
```

#### `withLanguage`

```php
withLanguage(string $language): self
```

Makes a request with a different language from the one globally defined in the [configuration](02-configuration.md#language).

Some endpoints may not support the `withLanguage` method.
Check the [official documentation](https://docs.sportmonks.com/football/api/translations-beta) for more information.

> **Note**
> This is feature is still in beta and may change in the future.

```php
// Get all fixtures in Japanese
$fixtures = $sportMonksFootball->fixtures()
    ->withLanguage(Language::JAPANESE)
    ->getAll();
```

#### `withCacheTtl`

```php
withCacheTtl(int $seconds): self
```

Makes a request and saves into cache for the provided duration in seconds. 

If `0` seconds is provided, the request will not be cached.

> **Note**
> Setting cache to `0` seconds will **not** invalidate any existing cache.

Available for all APIs if `cache` is enabled in the [configuration](02-configuration.md#cache).

```php
// Get all fixtures and cache for 1 day
$fixtures = $sportMonksFootball->fixtures()
    ->withCacheTtl(3600 * 24)
    ->getAll();
```