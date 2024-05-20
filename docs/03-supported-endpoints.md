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
- [Pagination](#pagination-1)
  - [withPage](#withpage)
  - [withPerPage](#withperpage)
  - [withSortBy](#withsortby)
  - [withOrder](#withorder)
  - [withPagination](#withpagination)
- [Select, Include and Filters](#select-include-and-filters)
  - [withSelect](#withselect)
  - [withInclude](#withinclude)
  - [withFilter](#withfilter)
- [Timezone, Language and Cache TTL](#timezone-language-and-cache-ttl)
  - [withTimezone](#withtimezone)
  - [withLanguage](#withlanguage)
  - [withCacheTtl](#withcachettl)

## Responses

All successful responses will return an [`<Entity>Item`](05-entities.md#entityitem) or an [`<Entity>Collection`](05-entities.md#entitycollection).

One of the differences between an [`<Entity>Item`](05-entities.md#entityitem) and an [`<Entity>Collection`](05-entities.md#entitycollection)
is that the [`<Entity>Item`](05-entities.md#entityitem) `getData()` method will return a single _Entity_ object,
while the [`<Entity>Collection`](05-entities.md#entitycollection) `getData()` method will return an array of _Entity_ objects.

For example, when requesting a fixture by id, the response will be a `FixtureItem` object and the `getData()` method will return a [`Fixture`](05-entities.md#fixture) object.
The same way that when requesting all fixtures, the response will be a `FixtureCollection` object and the `getData()` method will return an array of [`Fixture`](05-entities.md#fixture) objects.
Check the [responses objects](05-entities.md#response-objects) for more information.

```php
// returns a FixtureItem object
$response = $api->fixtures()->getById(1);
// returns a Fixture object
$fixture = $response->getData();
echo $fixture->getName();

// returns a FixtureCollection object
$response = $api->fixtures()->getAll();
// returns an array of Fixture objects
$fixtures = $response->getData();
foreach ($fixtures as $fixture) {
    echo $fixture->getName();
}
```

### Pagination

[`<Entity>Collection`](05-entities.md#entitycollection) responses that contain pagination data (not all of them have)
will be accessible through the `getPagination()` method:

```php
$response = $api->fixtures()->getAll();

echo $response->getPagination()->getCount();
echo $response->getPagination()->getPerPage();
echo $response->getPagination()->getCurrentPage();
echo $response->getPagination()->getNextPage();
echo $response->getPagination()->hasMore();
```

### Rate Limit

All responses include the `getRateLimit()` method with the current quota usage.
Check the [official documentation](https://docs.sportmonks.com/football/api/rate-limit) for more information.

```php
$response = $api->fixtures()->getById(1);

echo $response->getRateLimit()->getRemainingNumRequests();
echo $response->getRateLimit()->getSecondsToReset();
echo $response->getRateLimit()->getRequestedEntity();
```

### Timezone

All responses include the `getTimezone()` method with the timezone of the given data.
By default, all responses will be in the `UTC` timezone.

To request data in a different timezone for all requests, check the [configuration section](02-configuration.md#timezone).
For a single endpoint, check the [`withTimezone` section](#withtimezone).

```php
$response = $api->fixtures()->getById(1);

echo $response->getTimezone(); // UTC
```

## Football Endpoints

### Coaches

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches)

#### `getAll`

```php
getAll(): CoachCollection
```

Get all coaches:

```php
$response = $api->coaches()->getAll();
```

#### `getById`

```php
getById(int $id): CoachItem
```

Get coach by id:

```php
$response = $api->coaches()->getById(1);
```

#### `getAllByCountryId`

```php
getAllByCountryId(int $countryId): CoachCollection
```

Get all coaches by country id:

```php
$response = $api->coaches()->getAllByCountryId(1);
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query): CoachCollection
```

Get all coaches by search query:

```php
$response = $api->coaches()->getAllBySearchQuery('coach');
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): CoachCollection
```

Get all coaches that received updates in the last couple of hours:

```php
$response = $api->coaches()->getAllLastUpdated();
```

### Commentaries

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries)

#### `getAll`

```php
getAll(): CommentaryCollection
```

Get all commentaries:

```php
$response = $api->commentaries()->getAll();
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId): CommentaryCollection
```

Get all commentaries by fixture id:

```php
$response = $api->commentaries()->getAllByFixtureId(1);
```

### Fixtures

- [Official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures)

#### `getAll`

```php
getAll(): FixtureCollection
```

Get all fixtures:

```php
$response = $api->fixtures()->getAll();
```

#### `getById`

```php
getById(int $id): FixtureItem
```

Get fixture by id:

```php
$response = $api->fixtures()->getById(1);
```

#### `getAllByMultipleIds`

```php
getAllByMultipleIds(array $ids): FixtureCollection
```

Get all fixtures by multiple ids:

```php
$response = $api->fixtures()->getAllByMultipleIds([1, 2, 3]);
```

#### `getAllByDate`

```php
getAllByDate(\DateTimeInterface $date): FixtureCollection
```

Get all fixtures by date:

```php
$response = $api->fixtures()->getAllByDate(new DateTime('today'));
```

#### `getAllByDateRange`

```php
getAllByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): FixtureCollection
```

Get all fixtures by date range:

```php
$response = $api->fixtures()->getAllByDateRange(new DateTime('today'), new DateTime('+7 days'));
```

#### `getAllByTeamIdAndDateRange`

```php
getAllByTeamIdAndDateRange(int $teamId, \DateTimeInterface $startDate, \DateTimeInterface $endDate): FixtureCollection
```

Get all fixtures by team id and date range:

```php
$response = $api->fixtures()->getAllByTeamIdAndDateRange(1, new DateTime('today'), new DateTime('+7 days'));
```

#### `getAllByHeadToHead`

```php
getAllByHeadToHead(int $teamId1, int $teamId2): FixtureCollection
```

Get all fixtures between two teams:

```php
$response = $api->fixtures()->getAllByHeadToHead(1, 2);
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query): FixtureCollection
```

Get all fixtures by search query:

```php
$response = $api->fixtures()->getAllBySearchQuery('team');
```

#### `getAllUpcomingByMarketId`

```php
getAllUpcomingByMarketId(int $marketId): FixtureCollection
```

Get all upcoming fixtures by market id:

```php
$response = $api->fixtures()->getAllUpcomingByMarketId(1);
```

#### `getAllUpcomingByTvStationId`

```php
getAllUpcomingByTvStationId(int $tvStationId): FixtureCollection
```

Get all upcoming fixtures by tv station id:

```php
$response = $api->fixtures()->getAllUpcomingByTvStationId(1);
```

#### `getAllPastByTvStationId`

```php
getAllPastByTvStationId(int $tvStationId): FixtureCollection
```

Get all past fixtures by tv station id:

```php
$response = $api->fixtures()->getAllPastByTvStationId(1);
```

#### `getAllLastUpdated`

```php
getAllLastUpdated(): FixtureCollection
```

Get all last updated fixtures:

```php
$response = $api->fixtures()->getAllLastUpdated();
```

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

#### `getAll`

```php
getAll(): BookmakerCollection
```

Get all bookmakers:

```php
$response = $api->bookmakers()->getAll();
```

#### `getById`

```php
getById(int $id): BookmakerItem
```

Get bookmaker by id:

```php
$response = $api->bookmakers()->getById(1);
```

#### `getAllByFixtureId`

```php
getAllByFixtureId(int $fixtureId): BookmakerCollection
```

Get all bookmakers by fixture id:

```php
$response = $api->bookmakers()->getAllByFixtureId(1);
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query): BookmakerCollection
```

Get all bookmakers by search query:

```php
$response = $api->bookmakers()->getAllBySearchQuery('bet');
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

#### `getAll`

```php
getAll(): CityCollection
```

Get all cities:

```php
$response = $api->cities()->getAll();
```

#### `getById`

```php
getById(int $id): CityItem
```

Get city by id:

```php
$response = $api->cities()->getById(1);
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query): CityCollection
```

Get all cities by search query:

```php
$response = $api->cities()->getAllBySearchQuery('lisbon');
```

### Continents

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/continents)

#### `getAll`

```php
getAll(): ContinentCollection
```

Get all continents:

```php
$response = $api->continents()->getAll();
```

#### `getById`

```php
getById(int $id): ContinentItem
```

Get continent by id:

```php
$response = $api->continents()->getById(1);
```

### Countries

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/countries)

#### `getAll`

```php
getAll(): CountryCollection
```

Get all countries:

```php
$response = $api->countries()->getAll();
```

#### `getById`

```php
getById(int $id): CountryItem
```

Get country by id:

```php
$response = $api->countries()->getById(1);
```

#### `getAllBySearchQuery`

```php
getAllBySearchQuery(string $query): CountryCollection
```

Get all countries by search query:

```php
$response = $api->countries()->getAllBySearchQuery('country');
```

### Filters

- [Official documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/filters)

#### `getAllByEntity`

```php
getAllByEntity(): FilterEntityCollection
```

Get all filters grouped by entity:

```php
$response = $api->filters()->getAllByEntity();
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

## Pagination

#### `withPage`

```php
withPage(int $page): self
```

Determine the results page number.

```php
$api->fixtures()
    ->withPage(2)
    ->getAll();
```

#### `withPerPage`

```php
withPerPage(int $perPage): self
```

Determine the number of results per page. 
Please note that it only affects the results of the base entity, so includes are not paginated.

```php
$api->fixtures()
    ->withPerPage(50)
    ->getAll();
```

#### `withSortBy`

```php
withSortBy(string $sortBy): self
```

Specifies the field by which the data will be sorted. Currently supported fields include:
- `starting_at`
- `name`

```php
$api->fixtures()
    ->withSortBy('starting_at')
    ->getAll();
```

#### `withOrder`

```php
withOrder(string $order): self
```

Determines the order in which the data will be sorted. Options are between ascending and descending:
- `asc`
- `desc`


```php
$api->fixtures()
    ->withOrder('desc')
    ->getAll();
```

#### `withPagination`

```php
withPagination(int $page, int $perPage = 25, ?string $sortBy = null, string $order = 'asc'): self
```

Shorthand version of the combined `withPage`, `withPerPage`, `withSortBy` and `withOrder` methods.

```php
// returns page 5 with 50 fixtures per page sorted by "starting_at" in descending order
$api->fixtures()
    ->withPagination(5, 50, 'starting_at', 'desc')
    ->getAll();

// equivalent to
$api->fixtures()
    ->withPage(5)
    ->withPerPage(50)
    ->withSortBy('starting_at')
    ->withOrder('desc')
    ->getAll();
```

## Select, Include and Filters

#### `withSelect`

```php
withSelect(string $select): self
```

It is possible to request only specific fields on entities and on includes.
The advantage of selecting specific fields is that it reduces the response speed in mainly large responses. 
In addition to reducing response time, the response size is also reduced.

For selecting fields on includes, check the [`withInclude`](#withinclude) section.

```php
// get fixture with fields "name" and "starting_at" only
$api->fixtures()
    ->withSelect('name,starting_at')
    ->getById(1);
```

#### `withInclude`

```php
withInclude(string $include): self
```

Includes allow to enrich the response with relational data.
This means that it is possible to request a fixture and have the venue data in the same response without any additional requests.
To check what includes ara available per endpoint, check the [official documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints).

```php
// get fixture with "venue" and "participants" (teams) data
$api->fixtures()
    ->withInclude('venue,participants')
    ->getById(1);

// it is also possible to get nested includes
// this will return venue data and country data inside the venue
$api->fixtures()
    ->withInclude('venue.country')
    ->getById(1);
```

To better understand how it works, check the [official documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/enrich-your-response).

To select fields in includes (similar to the [`withSelect`](#withselect)), you can do the following:

```php
// get fixture with "venue" data with fields "name" and "city_name" only
$api->fixtures()
    ->withInclude('venue:name,city_name')
    ->getById(1);
```

#### `withFilter`

```php
withFilter(string $filter): self
```

Filters are useful to make conditional requests. For example, get fixture events that are only goals:

```php
// get fixture with "events" that are only goals, own goals or penalties.
$api->fixtures()
    ->withInclude('events')
    ->withFilter('eventTypes:14,15,16'])
    ->getById(1);
```

To better understand how it works, check the [official documentation](https://docs.sportmonks.com/football/api/request-options/filtering).

## Timezone, Language and Cache TTL

#### `withTimezone`

```php
withTimezone(string $timezone): self
```

Makes a request with a different timezone from the one globally defined in the [configuration](02-configuration.md#timezone).

Check the [official documentation](https://docs.sportmonks.com/football/tutorials-and-guides/tutorials/timezone-parameters-on-different-endpoints) for more information.

```php
// get all fixtures in the Europe/Lisbon timezone
$api->fixtures()
    ->withTimezone('Europe/Lisbon')
    ->getAll();
```

#### `withLanguage`

```php
withLanguage(string $language): self
```

Makes a request with a different language from the one globally defined in the [configuration](02-configuration.md#language).

Check the [official documentation](https://docs.sportmonks.com/football/api/translations-beta) for more information.

> [!NOTE]
> This is feature is still in beta and may change in the future.

```php
// get all fixtures in Japanese
$api->fixtures()
    ->withLanguage(Language::JAPANESE)
    ->getAll();
```

#### `withCacheTtl`

```php
withCacheTtl(?int $ttl): self
```

Makes a request and saves into cache for the provided duration in seconds.

Semantics of values:
- `0`, the response will not be cached (if the servers specifies no `max-age`).
- `null`, the response will be cached for as long as it can (forever).

> [!NOTE]
> Setting cache to `null` or `0` seconds will **not** invalidate any existing cache.

Available for all APIs if a cache adapter is set.
Check the following [documentation](02-configuration.md#setcachebuilder) for more information.

```php
// Get all fixtures and cache for 1 day
$api->fixtures()
    ->withCacheTtl(3600 * 24)
    ->getAll();
```