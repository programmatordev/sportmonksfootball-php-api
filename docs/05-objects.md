# Objects

- [Response Objects](#response-objects)
  - [&lt;Entity&gt;Item](#entityitem)
  - [&lt;Entity&gt;Collection](#entitycollection)
  - [Pagination](#pagination)
  - [Plan](#plan)
  - [RateLimit](#ratelimit)
  - [Subscription](#subscription)
- [Football Objects](#football-objects)
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
- [Odds Objects](#odds-objects)
  - [Bookmaker](#bookmaker)
  - [Market](#market)
  - [Odd](#odd)
- [Core Objects](#core-objects)
  - [City](#city)
  - [Continent](#continent)
  - [Country](#country)
  - [FilterEntity](#filterentity)
  - [Region](#region)
  - [Sport](#sport)
  - [Type](#type)
  - [TypeEntity](#typeentity)

## Response Objects

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

## Football Objects

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
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)

### Commentary

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getComment()`: `?string`
- `getMinute()`: `?int`
- `getExtraMinute()`: `?int`
- `isGoal()`: `?bool`
- `isImportant()`: `?bool`
- `getOrder()`: `?int`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getRelatedPlayer()`: [`?Player`](#player) (`relatedPlayer` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getNationality()`: [`?Country`](#country) (`nationality` include is required)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy) (`trophies` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getFixtures()`: [`?Fixture[]`](#fixture) (`fixtures` include is required)
- `getTeams()`: [`?TeamCoach[]`](#teamcoach) (`teams` include is required)
- `getStatistics()`: [`?CoachStatistic[]`](#coachstatistic) (`statistics` include is required)

### CoachStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getCoachId()`: `int`
- `getTeamId()`: `int`
- `getDetails()`: [`?CoachStatisticDetail[]`](#coachstatisticdetail) (`details` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getCoach()`: [`?Coach`](#coach) (`coach` include is required)
- `getTeam()`: [`?Team`](#team) (`team` include is required)

### CoachStatisticDetail

- `getId()`: `int`
- `getCoachStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getSubType()`: [`?Type`](#type) (`subType` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getRelatedPlayer()`: [`?Player`](#player) (`relatedPlayer` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)
- `getPeriod()`: [`?Period`](#period) (`period` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getRound()`: [`?Round`](#round) (`round` include is required)
- `getGroup()`: [`?Group`](#group) (`group` include is required)
- `getAggregate()`: [`?Aggregate`](#aggregate) (`aggregate` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getVenue()`: [`?Venue`](#venue) (`venue` include is required)
- `getState()`: [`?State`](#state) (`state` include is required)
- `getLineups()`: [`?Lineup[]`](#lineup) (`lineups` include is required)
- `getComments()`: [`?Commentary[]`](#commentary) (`comments` include is required)
- `getParticipants()`: [`?Participant[]`](#team) (`participants` include is required)
- `getOdds()`: [`?Odd[]`](#odd) (`odds` include is required)
- `getMetadata()`: [`?Metadata[]`](#metadata) (`metadata` include is required)
- `getWeatherReport()`: [`?WeatherReport`](#weatherreport) (`weatherReport` include is required)
- `getEvents()`: [`?Event[]`](#event) (`events` include is required)
- `getTimeline()`: [`?Event[]`](#event) (`timeline` include is required)
- `getStatistics()`: [`?FixtureStatistic[]`](#fixturestatistic) (`statistics` include is required)
- `getPeriods()`: [`?Period[]`](#period) (`periods` include is required)
- `getFormations()`: [`?Formation[]`](#formation) (`formations` include is required)
- `getScores()`: [`?Score[]`](#score) (`scores` include is required)
- `getTvStations()`: [`?FixtureTvStation[]`](#fixturetvstation) (`tvStations` include is required)
- `getReferees()`: [`?FixtureReferee[]`](#fixturereferee) (`referees` include is required)
- `getSidelined()`: [`?FixtureSidelined[]`](#fixturesidelined) (`sidelined` include is required)

### FixtureReferee

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getRefereeId()`: `int`
- `getTypeId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getReferee()`: [`?Referee`](#referee) (`referee` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)

### FixtureSidelined

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getSidelinedId()`: `int`
- `getParticipantId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getSidelined()`: [`?Sidelined`](#sidelined) (`sidelined` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)

### FixtureTvStation

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTvStationId()`: `int`
- `getCountryId()`: `int`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getTvStation()`: [`?TvStation`](#tvstation) (`tvStation` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)

### FixtureStatistic

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTypeId()`: `int`
- `getFixtureStatisticsId()`: `?int`
- `getParticipantId()`: `?int`
- `getPeriodId()`: `?int`
- `getData()`: `?array`
- `getLocation()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getPeriod()`: [`?Period`](#period) (`period` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)

### Formation

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getParticipantId()`: `int`
- `getFormation()`: `?string`
- `getLocation()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getStages()`: [`?Stage[]`](#stage) (`stages` include is required)
- `getLatestFixtures()`: [`?Fixture[]`](#fixture) (`latest` include is required)
- `getUpcomingFixtures()`: [`?Fixture[]`](#fixture) (`upcoming` include is required)
- `getInplayFixtures()`: [`?Fixture[]`](#fixture) (`inplay` include is required)
- `getTodayFixtures()`: [`?Fixture[]`](#fixture) (`today` include is required)
- `getCurrentSeason()`: [`?Season`](#season) (`currentSeason` include is required)
- `getSeasons()`: [`?Season[]`](#season) (`seasons` include is required)

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
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)
- `getDetailedPosition()`: [`?Type`](#type) (`detailedPosition` include is required)
- `getDetails()`: [`?LineupDetail[]`](#lineupdetail) (`details` include is required)

### LineupDetail

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getPlayerId()`: `int`
- `getTeamId()`: `int`
- `getLineupId()`: `int`
- `getTypeId()`: `int`
- `getData()`: `array`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)

### Metadata

- `getId()`: `int`
- `getMetadatableId()`: `int`
- `getTypeId()`: `int`
- `getValueType()`: `string`
- `getValues()`: `mixed`
- `getType()`: [`?Type`](#type) (`type` include is required)

### ParticipantTrophy

- `getId()`: `int`
- `getParticipantId()`: `int`
- `getLeagueId()`: `int`
- `getSeasonId()`: `int`
- `getTrophyId()`: `int`
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getTrophy()`: [`?Trophy`](#trophy) (`trophy` include is required)

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
- `hasTimer()`: `bool`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getEvents()`: [`?Event[]`](#event) (`events` include is required)
- `getTimeline()`: [`?Event[]`](#event) (`timeline` include is required)
- `getStatistics()`: [`?FixtureStatistic[]`](#fixturestatistic) (`statistics` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getCity()`: [`?City`](#city) (`city` include is required)
- `getNationality()`: [`?Country`](#country) (`nationality` include is required)
- `getTeams()`: [`?TeamSquad[]`](#teamsquad) (`teams` include is required)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy) (`trophies` include is required)
- `getTransfers()`: [`?Transfer[]`](#transfer) (`transfers` include is required)
- `getPendingTransfers()`: [`?Transfer[]`](#transfer) (`pendingTransfers` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)
- `getDetailedPosition()`: [`?Type`](#type) (`detailedPosition` include is required)
- `getLineups()`: [`?Lineup[]`](#lineup) (`lineups` include is required)
- `getLatestLineups()`: [`?Lineup[]`](#lineup) (`latest` include is required)
- `getMetadata()`: [`?Metadata[]`](#metadata) (`metadata` include is required)
- `getStatistics()`: [`?PlayerStatistic[]`](#playerstatistic) (`statistics` include is required)

### PlayerStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getPlayerId()`: `int`
- `getTeamId()`: `int`
- `getPositionId()`: `?int`
- `hasValues()`: `?bool`
- `getJerseyNumber()`: `?int`
- `getDetails()`: [`?PlayerStatisticDetail[]`](#playerstatisticdetail) (`details` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)

### PlayerStatisticDetail

- `getId()`: `int`
- `getPlayerStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getNationality()`: [`?Country`](#country) (`nationality` include is required)
- `getCity()`: [`?City`](#city) (`city` include is required)
- `getStatistics()`: [`?RefereeStatistic[]`](#refereestatistic) (`statistics` include is required)

### RefereeStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getRefereeId()`: `int`
- `getDetails()`: [`?RefereeStatisticDetail[]`](#refereestatisticdetail) (`details` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getReferee()`: [`?Referee`](#referee) (`referee` include is required)

### RefereeStatisticDetail

- `getId()`: `int`
- `getRefereeStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type) (`type` include is required)

### Rival

- `getId()`: `int`
- `getSportId()`: `int`
- `getTeamId()`: `int`
- `getRivalId()`: `int`
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getRival()`: [`?Team`](#team) (`rival` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)
- `getFixtures()`: [`?Fixture[]`](#fixture) (`fixtures` include is required)
- `getStatistics()`: [`?Statistic[]`](#statistic) (`statistics` include is required)

### Score

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getTypeId()`: `int`
- `getParticipantId()`: `int`
- `getGoals()`: `?int`
- `getLocation()`: `?string`
- `getDescription()`: `?string`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getStages()`: [`?Stage[]`](#stage) (`stages` include is required)
- `getCurrentStage()`: [`?Stage`](#stage) (`currentStage` include is required)
- `getFixtures()`: [`?Fixture[]`](#fixture) (`fixtures` include is required)
- `getTeams()`: [`?Team[]`](#team) (`teams` include is required)
- `getGroups()`: [`?Group[]`](#group) (`groups` include is required)
- `getStatistics()`: [`?Statistic[]`](#statistic) (`statistics` include is required)
- `getTopscorers()`: [`?Topscorer[]`](#topscorer) (`topscorers` include is required)

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
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)

### Social

- `getId()`: `int`
- `getSocialId()`: `int`
- `getSocialChannelId()`: `int`
- `getValue()`: `string`
- `getChannel()`: [`?SocialChannel`](#socialchannel) (`channel` include is required)

### SocialChannel

- `getId()`: `int`
- `getName()`: `?string`
- `getBaseUrl()`: `?string`
- `getHexColor()`: `?string`

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
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getRounds()`: [`?Round[]`](#round) (`rounds` include is required)
- `getCurrentRound()`: [`?Round`](#round) (`currentRound` include is required)
- `getGroups()`: [`?Group[]`](#group) (`groups` include is required)
- `getFixtures()`: [`?Fixture[]`](#fixture) (`fixtures` include is required)
- `getAggregates()`: [`?Aggregate[]`](#aggregate) (`aggregates` include is required)
- `getStatistics()`: [`?Statistic[]`](#statistic) (`statistics` include is required)
- `getTopscorers()`: [`?Topscorer[]`](#topscorer) (`topscorers` include is required)

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
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getLeague()`: [`?League`](#league) (`league` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)
- `getGroup()`: [`?Group`](#group) (`group` include is required)
- `getRound()`: [`?Round`](#round) (`round` include is required)
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getRule()`: [`?StandingRule`](#standingrule) (`rule` include is required)
- `getDetails()`: [`?StandingDetail[]`](#standingdetail) (`details` include is required)
- `getForm()`: [`?StandingForm[]`](#standingform) (`form` include is required)

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
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)
- `getGroup()`: [`?Group`](#group) (`group` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)

### StandingDetail

- `getId()`: `int`
- `getTypeId()`: `int`
- `getStandingId()`: `int`
- `getStandingType()`: `string`
- `getValue()`: `int`
- `getType()`: [`?Type`](#type) (`type` include is required)

### StandingForm

- `getId()`: `int`
- `getFixtureId()`: `int`
- `getStandingId()`: `int`
- `getStandingType()`: `string`
- `getForm()`: `string`
- `getOrder()`: `int`
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)

### StandingRule

- `getId()`: `int`
- `getTypeId()`: `int`
- `getModelId()`: `?int`
- `getModelType()`: `?string`
- `getPosition()`: `?int`
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getParticipant()`: [`Player`](#player)|[`Team`](#team)|`null` (`participant` include is required)

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
- `getMeta()`: [`?TeamMeta`](#teammeta)
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getLatestFixtures()`: [`?Fixture[]`](#fixture) (`latest` include is required)
- `getUpcomingFixtures()`: [`?Fixture[]`](#fixture) (`upcoming` include is required)
- `getSeasons()`: [`?Season[]`](#season) (`seasons` include is required)
- `getActiveSeasons()`: [`?Season[]`](#season) (`activeSeasons` include is required)
- `getVenue()`: [`?Venue`](#venue) (`venue` include is required)
- `getRivals()`: [`?Team[]`](#team) (`rivals` include is required)
- `getPlayers()`: [`?TeamSquad[]`](#teamsquad) (`players` include is required)
- `getSidelined()`: [`?Sidelined[]`](#sidelined) (`sidelined` include is required)
- `getSidelinedHistory()`: [`?Sidelined[]`](#sidelined) (`sidelinedHistory` include is required)
- `getTrophies()`: [`?ParticipantTrophy[]`](#participanttrophy) (`trophies` include is required)
- `getSocials()`: [`?Social[]`](#social) (`scoails` include is required)
- `getCoaches()`: [`?TeamCoach[]`](#teamcoach) (`coaches` include is required)
- `getStatistics()`: [`?TeamStatistic[]`](#teamstatistic) (`statistics` include is required)

### TeamCoach

- `getId()`: `int`
- `getTeamId()`: `int`
- `getCoachId()`: `int`
- `getPositionId()`: `int`
- `isActive()`: `?bool`
- `getStartedAt()`: `?\DateTimeImmutable`
- `getEndedAt()`: `?\DateTimeImmutable`
- `isTemporary()`: `?bool`
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getCoach()`: [`?Coach`](#coach) (`coach` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)

### TeamMeta

- `getLocation()`: `string`
- `isWinner()`: `bool`
- `getPosition()`: `int`

### TeamStatistic

- `getId()`: `int`
- `getSeasonId()`: `int`
- `getTeamId()`: `int`
- `hasValues()`: `?bool`
- `getDetails()`: [`?TeamStatisticDetail[]`](#teamstatisticdetail) (`details` include is required)
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getTeam()`: [`?Team`](#team) (`team` include is required)

### TeamStatisticDetail

- `getId()`: `int`
- `getTeamStatisticId()`: `int`
- `getTypeId()`: `int`
- `getValue()`: `array`
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getTeam()`: [`?Team`](#team) (`team` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)
- `getDetailedPosition()`: [`?Type`](#type) (`detailedPosition` include is required)
- `getTransfer()`: [`?Transfer`](#transfer) (`transfer` include is required)

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
- `getSeason()`: [`?Season`](#season) (`season` include is required)
- `getStage()`: [`?Stage`](#stage) (`stage` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getParticipant()`: [`?Team`](#team) (`participant` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)

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
- `getSport()`: [`?Sport`](#sport) (`sport` include is required)
- `getPlayer()`: [`?Player`](#player) (`player` include is required)
- `getType()`: [`?Type`](#type) (`type` include is required)
- `getFromTeam()`: [`?Team`](#team) (`fromTeam` include is required)
- `getToTeam()`: [`?Team`](#team) (`toTeam` include is required)
- `getPosition()`: [`?Type`](#type) (`position` include is required)
- `getDetailedPosition()`: [`?Type`](#type) (`detailedPosition` include is required)

### Trophy

- `getId()`: `int`
- `getSportId()`: `?int`
- `getPosition()`: `?int`
- `getName()`: `?string`

### TvStation

- `getId()`: `int`
- `getName()`: `?string`
- `getUrl()`: `?string`
- `getImagePath()`: `?string`
- `getType()`: `?string`
- `getRelatedId()`: `?int`
- `getCountries()`: [`?Country[]`](#country) (`countries` include is required)
- `getFixtures()`: [`?FixtureTvStation[]`](#fixturetvstation) (`fixtures` include is required)

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
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getCity()`: [`?City`](#city) (`city` include is required)
- `getFixtures()`: [`?Fixture[]`](#fixture) (`fixtures` include is required)

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
- `getVenue()`: [`?Venue`](#venue) (`venue` include is required)
- `getFixture()`: [`?Fixture[]`](#fixture) (`fixture` include is required)

### Wind

- `getSpeed()`: `float`
- `getDirection()`: `int`

## Odds Objects

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
- `getFixture()`: [`?Fixture`](#fixture) (`fixture` include is required)
- `getMarket()`: [`?Market`](#market) (`market` include is required)
- `getBookmaker()`: [`?Bookmaker`](#bookmaker) (`bookmaker` include is required)

## Core Objects

### City

- `getId()`: `int`
- `getRegionId()`: `int`
- `getCountryId()`: `?int`
- `getName()`: `?string`
- `getLatitude()`: `?float`
- `getLongitude()`: `?float`
- `getRegion()`: [`?Region`](#region) (`region` include is required)

### Continent

- `getId()`: `int`
- `getName()`: `?string`
- `getCode()`: `?string`
- `getCountries()`: [`?Country[]`](#country) (`countries` include is required)

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
- `getContinent()`: [`?Continent`](#continent) (`continent` include is required)
- `getRegions()`: [`?Region[]`](#region) (`regions` include is required)

### FilterEntity

- `getName()`: `string`
- `getFilters()`: `array`

### Region

- `getId()`: `int`
- `getCountryId()`: `int`
- `getName()`: `?string`
- `getCountry()`: [`?Country`](#country) (`country` include is required)
- `getCities()`: [`?City[]`](#city) (`cities` include is required)

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
- `getTypes()`: [`Type[]`](#type) (`types` include is required)