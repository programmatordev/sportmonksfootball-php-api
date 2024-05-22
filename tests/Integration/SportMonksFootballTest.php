<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\BookmakerResource;
use ProgrammatorDev\SportMonksFootball\Resource\CityResource;
use ProgrammatorDev\SportMonksFootball\Resource\CoachResource;
use ProgrammatorDev\SportMonksFootball\Resource\CommentaryResource;
use ProgrammatorDev\SportMonksFootball\Resource\ContinentResource;
use ProgrammatorDev\SportMonksFootball\Resource\CountryResource;
use ProgrammatorDev\SportMonksFootball\Resource\FilterResource;
use ProgrammatorDev\SportMonksFootball\Resource\FixtureResource;
use ProgrammatorDev\SportMonksFootball\Resource\LeagueResource;
use ProgrammatorDev\SportMonksFootball\Resource\LivescoreResource;
use ProgrammatorDev\SportMonksFootball\Resource\MarketResource;
use ProgrammatorDev\SportMonksFootball\Resource\PlayerResource;
use ProgrammatorDev\SportMonksFootball\Resource\PreMatchOddResource;
use ProgrammatorDev\SportMonksFootball\Resource\RefereeResource;
use ProgrammatorDev\SportMonksFootball\Resource\RegionResource;
use ProgrammatorDev\SportMonksFootball\Resource\RivalResource;
use ProgrammatorDev\SportMonksFootball\Resource\RoundResource;
use ProgrammatorDev\SportMonksFootball\Resource\ScheduleResource;
use ProgrammatorDev\SportMonksFootball\Resource\SeasonResource;
use ProgrammatorDev\SportMonksFootball\Resource\StageResource;
use ProgrammatorDev\SportMonksFootball\Resource\StandingResource;
use ProgrammatorDev\SportMonksFootball\Resource\StateResource;
use ProgrammatorDev\SportMonksFootball\Resource\StatisticResource;
use ProgrammatorDev\SportMonksFootball\Resource\TeamResource;
use ProgrammatorDev\SportMonksFootball\Resource\TeamSquadResource;
use ProgrammatorDev\SportMonksFootball\Resource\TimezoneResource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SportMonksFootballTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(BookmakerResource::class, $this->api->bookmakers());
        $this->assertInstanceOf(CityResource::class, $this->api->cities());
        $this->assertInstanceOf(CoachResource::class, $this->api->coaches());
        $this->assertInstanceOf(CommentaryResource::class, $this->api->commentaries());
        $this->assertInstanceOf(ContinentResource::class, $this->api->continents());
        $this->assertInstanceOf(CountryResource::class, $this->api->countries());
        $this->assertInstanceOf(FilterResource::class, $this->api->filters());
        $this->assertInstanceOf(FixtureResource::class, $this->api->fixtures());
        $this->assertInstanceOf(LeagueResource::class, $this->api->leagues());
        $this->assertInstanceOf(LivescoreResource::class, $this->api->livescores());
        $this->assertInstanceOf(MarketResource::class, $this->api->markets());
        $this->assertInstanceOf(PlayerResource::class, $this->api->players());
        $this->assertInstanceOf(PreMatchOddResource::class, $this->api->preMatchOdds());
        $this->assertInstanceOf(RefereeResource::class, $this->api->referees());
        $this->assertInstanceOf(RegionResource::class, $this->api->regions());
        $this->assertInstanceOf(RivalResource::class, $this->api->rivals());
        $this->assertInstanceOf(RoundResource::class, $this->api->rounds());
        $this->assertInstanceOf(ScheduleResource::class, $this->api->schedules());
        $this->assertInstanceOf(SeasonResource::class, $this->api->seasons());
        $this->assertInstanceOf(StageResource::class, $this->api->stages());
        $this->assertInstanceOf(StandingResource::class, $this->api->standings());
        $this->assertInstanceOf(StateResource::class, $this->api->states());
        $this->assertInstanceOf(StatisticResource::class, $this->api->statistics());
        $this->assertInstanceOf(TeamResource::class, $this->api->teams());
        $this->assertInstanceOf(TeamSquadResource::class, $this->api->teamSquads());
        $this->assertInstanceOf(TimezoneResource::class, $this->api->timezones());
    }
}