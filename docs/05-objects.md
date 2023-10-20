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
  - [CoachStatistic](#coachstatistic)
  - [CoachStatisticDetail](#coachstatisticdetail)
  - [Event](#event)
  - [Fixture](#fixture)
  - [FixtureReferee](#fixturereferee)
  - [FixtureSidelined](#fixturesidelined)
  - [FixtureStatistic](#fixturestatistic)
  - [FixtureTvStation](#fixturetvstation)
  - [Formation](#formation)
  - [Group](#group)
  - [League](#league)
  - [Lineup](#lineup)
  - [Metadata](#metadata)
  - [ParticipantTrophy](#participanttrophy)
  - [Period](#period)
  - [Player](#player)
  - [PlayerStatistic](#playerstatistic)
  - [PlayerStatisticDetail](#playerstatisticdetail)
  - [Referee](#referee)
  - [RefereeStatistic](#refereestatistic)
  - [RefereeStatisticDetail](#refereestatisticdetail)
  - [Rival](#rival)
  - [Round](#round)
  - [Season](#season)
  - [Score](#score)
  - [Sidelined](#sidelined)
  - [Social](#social)
  - [Stage](#stage)
  - [Standing](#standing)
  - [StandingCorrection](#standingcorrection)
  - [StandingDetail](#standingdetail)
  - [StandingForm](#standingform)
  - [StandingRule](#standingrule)
  - [State](#state)
  - [Statistic](#statistic)
  - [Team](#team)
  - [TeamMeta](#teammeta)
  - [TeamStatistic](#teamstatistic)
  - [TeamStatisticDetail](#teamstatisticdetail)
  - [TeamSquad](#teamsquad)
  - [Temperature](#temperature)
  - [Topscorer](#topscorer)
  - [Transfer](#transfer)
  - [TvStation](#tvstation)
  - [Venue](#venue)
  - [WeatherReport](#weatherreport)
  - [Wind](#wind)
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

### CoachStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getCoachId()`: `int`
- `getTeamId()`: `int`
- `getDetails()`: [`?CoachStatisticDetail[]`](#coachstatisticdetail)
- `getSeason()`: [`?Season`](#season)
- `getCoach()`: [`?Coach`](#coach)
- `getTeam()`: [`?Team`](#team)

### CoachStatisticDetail

- `getId()`: `int`
- `getCoachStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type)

### CoachTeam

- `getId()`: `int`
- `getTeamId()`: `int`
- `getCoachId()`: `int`
- `getPositionId()`: `int`
- `isActive()`: `?bool`
- `getStartedAt()`: `?\DateTimeImmutable`
- `getEndedAt()`: `?\DateTimeImmutable`
- `isTemporary()`: `?bool`
- `getTeam()`: [`?Team`](#team)
- `getCoach()`: [`?Coach`](#coach)
- `getPosition()`: [`?Type`](#type)

### Event

- `getId()`: `int`
- `getTypeId()`: `int`
- `getSubTypeId()`: `?int`
- `getPlayerId()`: `?int`
- `getRelatedPlayerId()`: `?int`
- `getPeriodId()`: `int`
- `getParticipantId()`: `int`
- `getCoachId()`: `?int`
- `getSection()`: `?string`
- `getPlayerName()`: `?string`
- `getRelatedPlayerName()`: `?string`
- `getResult()`: `?string`
- `getInfo()`: `?string`
- `getAdditionalInfo()`: `?string`
- `getMinute()`: `?int`
- `getExtraMinute()`: `?int`
- `isInjured()`: `?bool`
- `isOnBench()`: `?bool`
- `getFixture()`: [`?Fixture`](#fixture)
- `getType()`: [`?Type`](#type)
- `getSubType()`: [`?Type`](#type)
- `getPlayer()`: [`?Player`](#player)
- `getRelatedPlayer()`: [`?Player`](#player)
- `getParticipant()`: [`?Team`](#team)
- `getPeriod()`: [`?Period`](#period)

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
- `getRound()`: [`?Round`](#round)
- `getGroup()`: [`?Group`](#group)
- `getAggregate()`: [`?Aggregate`](#aggregate)
- `getSeason()`: [`?Season`](#season)
- `getVenue()`: [`?Venue`](#venue)
- `getState()`: [`?State`](#state)
- `getLineups()`: [`?Lineup[]`](#lineup)
- `getComments()`: [`?Commentary[]`](#commentary)
- `getParticipants()`: [`?Participant[]`](#team)
- `getOdds()`: [`?Odd[]`](#odd)
- `getMetadata()`: [`?Metadata[]`](#metadata)
- `getWeatherReport()`: [`?WeatherReport`](#weatherreport)
- `getEvents()`: [`?Event[]`](#event)
- `getTimeline()`: [`?Event[]`](#event)
- `getEvents()`: [`?Event[]`](#event)
- `getStatistics()`: [`?FixtureStatistic[]`](#fixturestatistic)
- `getPeriods()`: [`?Period[]`](#period)
- `getFormations()`: [`?Formation[]`](#formation)
- `getScores()`: [`?Score[]`](#score)
- `getTvStations()`: [`?FixtureTvStation[]`](#fixturetvstation)
- `getReferees()`: [`?FixtureReferee[]`](#fixturereferee)
- `getSidelined()`: [`?FixtureSidelined[]`](#fixturesidelined)

### FixtureReferee

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getRefereeId()`: `int`
- `getTypeId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getReferee()`: [`?Referee`](#referee)
- `getType()`: [`?Type`](#type)

### FixtureSidelined

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getSidelinedId()`: `int`
- `getParticipantId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getSidelined()`: [`?Sidelined`](#sidelined)
- `getParticipant()`: [`?Team`](#team)

### FixtureTvStation

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTvStationId()`: `int`
- `getCountryId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getTvStation()`: [`?TvStation`](#tvstation)
- `getCountry()`: [`?Country`](#country)

### FixtureStatistic

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTypeId()`: `int`
- `getFixtureStatisticsId()`: `?int`
- `getParticipantId()`: `?int`
- `getPeriodId()`: `?int`
- `getData()`: `?array`
- `getLocation()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture)
- `getType()`: [`?Type`](#type)
- `getPeriod()`: [`?Period`](#period)
- `getParticipant()`: [`?Team`](#team)

### Formation

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getParticipantId()`: `int`
- `getFormation()`: `?string`
- `getLocation()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture)
- `getParticipant()`: [`?Team`](#team)

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

### Period

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTypeId()`: `int`
- `getStartedAt()`: `?\DateTimeImmutable`
- `getEndedAt()`: `?\DateTimeImmutable`
- `getCountsFrom()`: `?int`
- `isTicking()`: `?bool`
- `getSortOrder()`: `?int`
- `getDescription()`: `?string`
- `getTimeAdded()`: `?int`
- `getPeriodLength()`: `?int`
- `getMinutes()`: `?int`
- `getSeconds()`: `?int`
- `getFixture()`: [`?Fixture`](#fixture)
- `getType()`: [`?Type`](#type)
- `getEvents()`: [`?Event[]`](#event)
- `getTimeline()`: [`?Event[]`](#event)
- `getStatistics()`: [`?FixtureStatistic[]`](#fixturestatistic)

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

### PlayerStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getPlayerId()`: `int`
- `getTeamId()`: `int`
- `getPositionId()`: `?int`
- `hasValues()`: `?bool`
- `getJerseyNumber()`: `?int`
- `getDetails()`: [`PlayerStatisticDetail[]`](#playerstatisticdetail)
- `getSeason()`: [`?Season`](#season)
- `getPlayer()`: [`?Player`](#player)
- `getTeam()`: [`?Team`](#team)
- `getPosition()`: [`?Type`](#type)

### PlayerStatisticDetail

- `getId()`: `int`
- `getPlayerStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type)

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

### RefereeStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getRefereeId()`: `int`
- `getDetails()`: [`RefereeStatisticDetail[]`](#refereestatisticdetail)
- `getSeason()`: [`?Season`](#season)
- `getReferee()`: [`?Referee`](#referee)

### RefereeStatisticDetail

- `getId()`: `int`
- `getRefereeStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type)

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

### Score

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTypeId()`: `int`
- `getParticipantId()`: `int`
- `getGoals()`: `?int`
- `getLocation()`: `?string`
- `getDescription()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture)
- `getParticipant()`: [`?Team`](#team)
- `getType()`: [`?Type`](#type)

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

### Standing

- `getId()`: `int`
- `getParticipantId()`: `int`
- `getSportId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getGroupId()`: `?int`
- `getRoundId()`: `?int`
- `getStandingRuleId()`: `?int`
- `getPosition()`: `?int`
- `getResult()`: `?string`
- `getPoints()`: `?int`
- `getParticipant()`: [`?Team`](#team)
- `getSeason()`: [`?Season`](#season)
- `getLeague()`: [`?League`](#league)
- `getStage()`: [`?Stage`](#stage)
- `getGroup()`: [`?Group`](#group)
- `getRound()`: [`?Round`](#round)
- `getSport()`: [`?Sport`](#sport)
- `getRule()`: [`?StandingRule`](#standingrule)
- `getDetails()`: [`?StandingDetail[]`](#standingdetail)
- `getForm()`: [`?StandingForm[]`](#standingform)

### StandingCorrection

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getStageId()`: `int`
- `getGroupId()`: `?int`
- `getTypeId()`: `int`
- `getParticipantId()`: `int`
- `getParticipantType()`: `?string`
- `getValue()`: `?int`
- `getCalcType()`: `?string`
- `isActive()`: `?bool`
- `getParticipant()`: [`?Team`](#team)
- `getSeason()`: [`?Season`](#season)
- `getStage()`: [`?Stage`](#stage)
- `getGroup()`: [`?Group`](#group)
- `getType()`: [`?Type`](#type)

### StandingDetail

- `getId()`: `int`
- `getTypeId()`: `int`
- `getStandingId()`: `int`
- `getStandingType()`: `string`
- `getValue()`: `int`
- `getType()`: [`?Type`](#type)

### StandingForm

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getStandingId()`: `int`
- `getStandingType()`: `string`
- `getForm()`: `string`
- `getOrder()`: `int`
- `getFixture()`: [`?Fixture`](#fixture)

### StandingRule

- `getId()`: `int`
- `getTypeId()`: `int`
- `getModelId()`: `?int`
- `getModelType()`: `?string`
- `getPosition()`: `?int`
- `getType()`: [`?Type`](#type)

### State

- `getId()`: `int`
- `getState()`: `?string`
- `getName()`: `?string`
- `getShortName()`: `?string`
- `getDeveloperName()`: `?string`

### Statistic

- `getId()`: `int`
- `getModelId()`: `int`
- `getTypeId()`: `int`
- `getRelationId()`: `?int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type)
- `getParticipant()`: [`Player`](#player)|[`Team`](#team)|`null`

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
- `getMeta()`: [`?TeamMeta`](#teammeta)

### TeamMeta

- `getLocation()`: `string`
- `isWinner()`: `bool`
- `getPosition()`: `int`

### TeamStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getTeamId()`: `int`
- `hasValues()`: `?bool`
- `getDetails()`: [`TeamStatisticDetail[]`](#teamstatisticdetail)
- `getSeason()`: [`?Season`](#season)
- `getTeam()`: [`?Team`](#team)

### TeamStatisticDetail

- `getId()`: `int`
- `getTeamStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type)

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

### Temperature

- `getMorning()`: `float`
- `getDay()`: `float`
- `getEvening()`: `float`
- `getNight()`: `float`

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

### WeatherReport

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getVenueId()`: `int`
- `getTemperature()`: [`?Temperature`](#temperature)
- `getFeelsLike()`: [`?Temperature`](#temperature)
- `getWind()`: [`?Wind`](#wind)
- `getHumidity()`: `?string`
- `getPressure()`: `?int`
- `getClouds()`: `?string`
- `getDescription()`: `?string`
- `getIcon()`: `?string`
- `getType()`: `?string`
- `getMetric()`: `?string`
- `isCurrent()`: `?bool`
- `getVenue()`: [`?Venue`](#venue)
- `getFixture()`: [`?Fixture[]`](#fixture)

### Wind

- `getSpeed()`: `float`
- `getDirection()`: `int`

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