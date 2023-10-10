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
  - [Commentary](#commentary)
  - [Coach](#coach)
  - [Fixture](#fixture)
  - [Group](#group)
  - [League](#league)
  - [Lineup](#lineup)
  - [Metadata](#metadata)
  - [ParticipantTrophy](#participanttrophy)
  - [Player](#player)
  - [Referee](#referee)
  - [Rival](#rival)
  - [Round](#round)
  - [Season](#season)
  - [Sidelined](#sidelined)
  - [Social](#social)
  - [Stage](#stage)
  - [State](#state)
  - [Team](#team)
  - [TeamSquad](#teamsquad)
  - [Topscorer](#topscorer)
  - [Transfer](#transfer)
  - [TvStation](#tvstation)
  - [Venue](#venue)
- [Odds Entities](#odds-entities)
  - [Bookmaker](#bookmaker)
  - [Market](#market)
  - [Odd](#odd)
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

### Commentary

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getComment()`: `?string`
- `getMinute()`: `?int`
- `getExtraMinute()`: `?int`
- `isGoal()`: `?bool`
- `isImportant()`: `?bool`
- `getOrder()`: `?int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getPlayer()`: [`?Player`](#player)
- `getRelatedPlayer()`: [`?Player`](#player)

### Coach

- `getId()`: `int`
- `getPlayerId()`: `int`
- `getSportId()`: `int`
- `getCountryId()`: `int`
- `getNationalityId()`: `int`
- `getCityId()`: `?int`
- `getCommonName()`: `?string`
- `getFirstName()`: `?string`
- `getLastName()`: `?string`
- `getName()`: `?string`
- `getDisplayName()`: `?string`
- `getImagePath()`: `?string`
- `getHeight()`: `?int`
- `getWeight()`: `?int`
- `getDateOfBirth()`: `?\DateTimeImmutable`
- `getGender()`: `?string`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getNationality()`: [`?Country`](#country)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy)
- `getPlayer()`: [`?Player`](#player)
- `getFixtures()`: [`?Fixture[]`](#fixture)

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

### Lineup

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getPlayerId()`: `int`
- `getTypeId()`: `int`
- `getPositionId()`: `?int`
- `getTeamId()`: `?int`
- `getSportId()`: `?int`
- `getFormationField()`: `?string`
- `getFormationPosition()`: `?int`
- `getPlayerName()`: `?string`
- `getJerseyNumber()`: `?int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getPlayer()`: [`?Player`](#player)
- `getType()`: [`?Type`](#type)
- `getPosition()`: [`?Type`](#type)
- `getDetailedPosition()`: [`?Type`](#type)

### Metadata

- `getId()`: `int`
- `getMetadatableId()`: `int`
- `getTypeId()`: `int`
- `getValueType()`: `string`
- `getValues()`: `mixed`
- `getType()`: [`?Type`](#type)

### ParticipantTrophy

- `getId()`: `int`
- `getParticipantId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getTrophyId()`: `int`
- `getTeam()`: [`?Team`](#team)
- `getLeague()`: [`?League`](#league)
- `getSeason()`: [`?Season`](#season)

### Player

- `getId()`: `int`
- `getSportId()`: `int`
- `getCountryId()`: `int`
- `getNationalityId()`: `?int`
- `getCityId()`: `?int`
- `getPositionId()`: `?int`
- `getDetailedPositionId()`: `?int`
- `getTypeId()`: `?int`
- `getCommonName()`: `?string`
- `getFirstName()`: `?string`
- `getLastName()`: `?string`
- `getName()`: `?string`
- `getDisplayName()`: `?string`
- `getImagePath()`: `?string`
- `getHeight()`: `?int`
- `getWeight()`: `?int`
- `getDateOfBirth()`: `?\DateTimeImmutable`
- `getGender()`: `?string`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getCity()`: [`?City`](#city)
- `getNationality()`: [`?Country`](#country)
- `getTeams()`: [`?TeamSquad[]`](#teamsquad)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy)
- `getTransfers()`: [`?Transfer[]`](#transfer)
- `getPendingTransfers()`: [`?Transfer[]`](#transfer)
- `getPosition()`: [`?Type`](#type)
- `getDetailedPosition()`: [`?Type`](#type)
- `getLineups()`: [`?Lineup[]`](#lineup)
- `getLatestLineups()`: [`?Lineup[]`](#lineup)
- `getMetadata()`: [`?Metadata[]`](#metadata)

### Referee

- `getId()`: `int`
- `getSportId()`: `int`
- `getCountryId()`: `?int`
- `getCityId()`: `?int`
- `getCommonName()`: `?string`
- `getFirstName()`: `?string`
- `getLastName()`: `?string`
- `getName()`: `?string`
- `getDisplayName()`: `?string`
- `getImagePath()`: `?string`
- `getHeight()`: `?int`
- `getWeight()`: `?int`
- `getDateOfBirth()`: `?\DateTimeImmutable`
- `getGender()`: `?string`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getNationality()`: [`?Country`](#country)
- `getCity()`: [`?City`](#city)

### Rival

- `getId()`: `int`
- `getSportId()`: `int`
- `getTeamId()`: `int`
- `getRivalId()`: `int`
- `getTeam()`: [`?Team`](#team)
- `getRival()`: [`?Team`](#team)

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

### Sidelined

- `getId()`: `int`
- `getPlayerId()`: `int`
- `getTypeId()`: `int`
- `getTeamId()`: `int`
- `getSeasonId()`: `?int`
- `getCategory()`: `?string`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `getGamesMissed()`: `?int`
- `isCompleted()`: `?bool`
- `getTeam()`: [`?Team`](#team)
- `getSeason()`: [`?Season`](#season)
- `getType()`: [`?Type`](#type)

### Social

- `getId()`: `int`
- `getSocialId()`: `int`
- `getSocialChannelId()`: `int`
- `getValue()`: `string`

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
- `getFoundedAt()`: `?int`
- `getType()`: `?string`
- `isPlaceholder()`: `?bool`
- `getLastPlayedAt()`: `?\DateTimeImmutable`
- `getSport()`: [`?Sport`](#sport)
- `getCountry()`: [`?Country`](#country)
- `getLatestFixtures()`: [`?Fixture[]`](#fixture)
- `getUpcomingFixtures()`: [`?Fixture[]`](#fixture)
- `getSeasons()`: [`?Season[]`](#season)
- `getActiveSeasons()`: [`?Season[]`](#season)
- `getVenue()`: [`?Venue`](#venue)
- `getRivals()`: [`?Team[]`](#team)
- `getPlayers()`: [`?TeamSquad[]`](#teamsquad)
- `getSidelined()`: [`?Sidelined[]`](#sidelined)
- `getSidelinedHistory()`: [`?Sidelined[]`](#sidelined)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy)
- `getSocials()`: [`?Social[]`](#social)

### TeamSquad

- `getId()`: `int`
- `getTransferId()`: `?int`
- `getPlayerId()`: `int`
- `getTeamId()`: `int`
- `getPosition()`: `int`
- `getDetailedPositionId()`: `?int`
- `getStartingAt()`: `?\DateTimeImmutable`
- `getEndingAt()`: `?\DateTimeImmutable`
- `isCaptain()`: `?bool`
- `getJerseyNumber()`: `?int`
- `getTeam()`: [`?Team`](#team)
- `getPlayer()`: [`?Player`](#player)
- `getPosition()`: [`?Type`](#type)
- `getDetailedPosition()`: [`?Type`](#type)
- `getTransfer()`: [`?Transfer`](#transfer)

### Topscorer

- `getId()`: `int`
- `getSeasonId()`: `?int`
- `getPlayerId()`: `int`
- `getTypeId()`: `int`
- `getParticipantId()`: `int`
- `getPosition()`: `int`
- `getTotal()`: `int`
- `getSeason()`: [`?Season`](#season)
- `getStage()`: [`?Stage`](#stage)
- `getPlayer()`: [`?Player`](#player)
- `getParticipant()`: [`?Team`](#team)
- `getType()`: [`?Type`](#type)

### Transfer

- `getId()`: `int`
- `getSportId()`: `int`
- `getPlayerId()`: `int`
- `getTypeId()`: `int`
- `getFromTeamId()`: `int`
- `getToTeamId()`: `int`
- `getPositionId()`: `?int`
- `getDetailedPositionId()`: `?int`
- `getDate()`: `?\DateTimeImmutable`
- `hasCareerEnded()`: `?bool`
- `isCompleted()`: `?bool`
- `getAmount()`: `?int`
- `getSport()`: [`?Sport`](#sport)
- `getPlayer()`: [`?Player`](#player)
- `getType()`: [`?Type`](#type)
- `getFromTeam()`: [`?Team`](#team)
- `getToTeam()`: [`?Team`](#team)
- `getPosition()`: [`?Type`](#type)
- `getDetailedPosition()`: [`?Type`](#type)

### TvStation

- `getId()`: `int`
- `getName()`: `?string`
- `getUrl()`: `?string`
- `getImagePath()`: `?string`
- `getType()`: `?string`
- `getRelatedId()`: `?int`
- `getCountries()`: [`?Country[]`](#country)

### Venue

- `getId()`: `int`
- `getCountryId()`: `?int`
- `getCityId()`: `?int`
- `getName()`: `?string`
- `getAddress()`: `?string`
- `getZipCode()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getCapacity()`: `?int`
- `getImagePath()`: `?string`
- `getCityName()`: `?string`
- `getSurface()`: `?string`
- `isNationalTeam()`: `?bool`
- `getCountry()`: [`?Country`](#country)
- `getCity()`: [`?City`](#city)
- `getFixtures()`: [`?Fixture[]`](#fixture)

## Odds Entities

### Bookmaker

- `getId()`: `int`
- `getLegacyId()`: `?int`
- `getName()`: `?string`

### Market

- `getId()`: `int`
- `getLegacyId()`: `?int`
- `getName()`: `?string`
- `getDeveloperName()`: `?string`
- `hasWinningCalculations()`: `?bool`

### Odd

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getMarketId()`: `int`
- `getBookmakerId()`: `int`
- `getLabel()`: `?string`
- `getValue()`: `?string`
- `getName()`: `?string`
- `getOrder()`: `?int`
- `getMarketDescription()`: `?string`
- `getProbability()`: `?string`
- `getDp3()`: `?string`
- `getFractional()`: `?string`
- `getAmerican()`: `?string`
- `isWinning()`: `?bool`
- `hasStopped()`: `?bool`
- `getTotal()`: `?string`
- `getHandicap()`: `?string`
- `getParticipants()`: `?string`
- `getCreatedAt()`: `?\DateTimeImmutable`
- `getUpdatedAt()`: `?\DateTimeImmutable`
- `getOriginalLabel()`: `?string`
- `getLatestBookmakerUpdatedAt()`: `?\DateTimeImmutable`
- `getFixture()`: [`?Fixture`](#fixture)
- `getMarket()`: [`?Market`](#market)
- `getBookmaker()`: [`?Bookmaker`](#bookmaker)

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