# Objects

- [Response Entities](#response-entities)
  - [&lt;Entity&gt;Item](#ltentitygtitem)
  - [&lt;Entity&gt;Collection](#ltentitygtcollection)
  - [Pagination](#pagination)
  - [Plan](#plan)
  - [RateLimit](#ratelimit)
  - [Subscription](#subscription)
- [Football Entities](#football-entities)
  - [Aggregate](#aggregate)
  - [Fixture](#fixture)
  - [Group](#group)
  - [League](#league)
  - [Round](#round)
  - [Season](#season)
  - [Stage](#stage)
  - [State](#state)
  - [Team](#team)
- [Core Entities](#core-entities)
  - [City](#city)
  - [Continent](#continent)
  - [Country](#country)
  - [FilterEntity](#filterentity)
  - [Region](#region)
  - [Sport](#sport)
  - [Type](#type)
  - [TypeEntity](#typeentity)

## Response Entities

### &lt;Entity&gt;Item

- `getData()`: _&lt;Entity&gt;_ object
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

### &lt;Entity&gt;Collection

- `getData()`: Array of _&lt;Entity&gt;_ objects
- `getPagination()`: [`?Pagination`](#pagination)
- `getSubscriptions()`: [`Subscription[]`](#subscription)
- `getRateLimit()`: [`RateLimit`](#ratelimit)
- `getTimezone()`: `string`

### Pagination

- `getCount()`: `int`
- `getPerPage()`: `int`
- `getCurrentPage()`: `int`
- `getNextPage()`: `?string`
- `hasMore()`: `bool`

### Plan

- `getName()`: `string`
- `getSport()`: `string`
- `getCategory()`: `string`

### RateLimit

- `getSecondsToReset()`: `int`
- `getRemainingNumRequests()`: `int`
- `getRequestedEntity()`: `string`

### Subscription

- `getMeta()`: `array`
- `getPlans()`: [`Plan[]`](#plan)
- `getAddOns()`: `array`
- `getWidgets()`: `array`

## Football Entities

### Aggregate

- `getId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getName()`: `?string`
- `getFixtureIds()`: `?array`
- `getResult()`: `?string`
- `getDetail()`: `?string`
- `getWinnerParticipantId()`: `?int`
- `getLeague()`: [`?League`](#league)
- `getSeason()`: [`?Season`](#season)
- `getStage()`: [`?Stage`](#stage)

### Fixture

- `getId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getGroupId()`: `?int`
- `getAggregateId()`: `?int`
- `getRoundId()`: `?int`
- `getStateId()`: `int`
- `getVenueId()`: `?int`
- `getName()`: `?string`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getResultInfo()`: `?string`
- `getLeg()`: `?string`
- `getDetails()`: `?string`
- `getLength()`: `?int`
- `isPlaceholder()`: `?bool`
- `hasOdds()`: `?bool`
- `getSport()`: [`?Sport`](#sport)
- `getStage()`: [`?Stage`](#stage)
- `getLeague()`: [`?League`](#league)

### Group

- `getId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getName()`: `?string`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `hasGamesInCurrentWeek()`: `?bool`
- `isCurrent()`: `?bool`
- `hasFinished()`: `?bool`
- `isPending()`: `?bool`

### League

- `getId()`: `int`
- `getSportId()`: `int`
- `getCountryId()`: `?int`
- `getName()`: `?string`
- `isActive()`: `?bool`
- `getShortCode()`: `?string`
- `getImagePath()`: `?string`
- `getType()`: `?string`
- `getSubType()`: `?string`
- `getLastPlayedAt()`: `?\DateTimeImmutable`
- `getCategory()`: `?int`
- `hasJerseys()`: `?bool`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getStages()`: [`?Stage[]`](#stage)
- `getLatestFixtures()`: [`?Fixture[]`](#fixture)
- `getUpcomingFixtures()`: [`?Fixture[]`](#fixture)
- `getInplayFixtures()`: [`?Fixture[]`](#fixture)
- `getTodayFixtures()`: [`?Fixture[]`](#fixture)
- `getCurrentSeason()`: [`?Season`](#season)
- `getSeasons()`: [`?Season[]`](#season)

### Round

- `getId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getName()`: `?string`
- `hasFinished()`: `?bool`
- `isCurrent()`: `?bool`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `hasGamesInCurrentWeek()`: `?bool`
- `getSport()`: [`?Sport`](#sport)
- `getLeague()`: [`?League`](#league)
- `getSeason()`: [`?Season`](#season)
- `getStage()`: [`?Stage`](#stage)
- `getFixtures()`: [`?Fixture[]`](#fixture)

### Season

- `getId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getTieBreakerRuleId()`: `?int`
- `getName()`: `?string`
- `hasFinished()`: `?bool`
- `isPending()`: `?bool`
- `isCurrent()`: `?bool`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `getStandingsRecalculatedAt()`: `?\DateTimeImmutable`
- `hasGamesInCurrentWeek()`: `?bool`
- `getSport()`: [`?Sport`](#sport)
- `getLeague()`: [`?League`](#league)
- `getStages()`: [`?Stage[]`](#stage)
- `getCurrentStage()`: [`?Stage`](#stage)
- `getFixtures()`: [`?Fixture[]`](#fixture)
- `getTeams()`: [`?Team[]`](#team)
- `getGroups()`: [`?Group[]`](#group)

### Stage

- `getId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getTypeId()`: `int`
- `getName()`: `?string`
- `getSortOrder()`: `?int`
- `hasFinished()`: `?bool`
- `isCurrent()`: `?bool`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `hasGamesInCurrentWeek()`: `?bool`
- `getTieBreakerRuleId()`: `?bool`
- `getLeague()`: [`?League`](#league)
- `getType()`: [`?Type`](#type)
- `getSport()`: [`?Sport`](#sport)
- `getSeason()`: [`?Season`](#season)
- `getRounds()`: [`?Round[]`](#round)
- `getCurrentRound()`: [`?Round`](#round)
- `getGroups()`: [`?Group[]`](#group)
- `getFixtures()`: [`?Fixture[]`](#fixture)
- `getAggregates()`: [`?Aggregate[]`](#aggregate)

### State

- `getId()`: `int`
- `getState()`: `?string`
- `getName()`: `?string`
- `getShortName()`: `?string`
- `getDeveloperName()`: `?string`

### Team

- `getId()`: `int`
- `getSportId()`: `int`
- `getCountryId()`: `int`
- `getVenueId()`: `?int`
- `getGender()`: `?string`
- `getName()`: `?string`
- `getShortCode()`: `?string`
- `getImagePath()`: `?string`
- `getFounded()`: `?int`
- `getType()`: `?string`
- `isPlaceholder()`: `?bool`
- `getLastPlayedAt()`: `?\DateTimeImmutable`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getLatestFixtures()`: [`?Fixture[]`](#fixture)
- `getUpcomingFixtures()`: [`?Fixture[]`](#fixture)
- `getSeasons()`: [`?Season[]`](#season)
- `getActiveSeasons()`: [`?Season[]`](#season)

## Core Entities

### City

- `getId()`: `int`
- `getRegionId()`: `int`
- `getCountryId()`: `?int`
- `getName()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getRegion()`: [`?Region`](#region)

### Continent

- `getId()`: `int`
- `getName()`: `?string`
- `getCode()`: `?string`
- `getCountries()`: [`?Country[]`](#country)

### Country

- `getId()`: `int`
- `getContinentId()`: `int`
- `getName()`: `?string`
- `getOfficialName()`: `?string`
- `getFifaName()`: `?string`
- `getIso2()`: `?string`
- `getIso3()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getBorders()`: `?array`
- `getImagePath()`: `?string`
- `getContinent()`: [`?Continent`](#continent)
- `getRegions()`: [`?Region[]`](#region)

### FilterEntity

- `getName()`: `string`
- `getFilters()`: `array`

### Region

- `getId()`: `int`
- `getCountryId()`: `int`
- `getName()`: `?string`
- `getCountry()`: [`?Country`](#country)
- `getCities()`: [`?City[]`](#city)

### Sport

- `getId()`: `int`
- `getName()`: `?string`
- `getCode()`: `?string`

### Type

- `getId()`: `int`
- `getName()`: `string`
- `getCode()`: `string`
- `getDeveloperName()`: `string`
- `getModelType()`: `string`
- `getStatGroup()`: `?string`

### TypeEntity

- `getName()`: `string`
- `getUpdatedAt()`: `\DateTimeImmutable`
- `getTypes()`: [`Type[]`](#type)