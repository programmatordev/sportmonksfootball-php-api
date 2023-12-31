<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\BookmakerEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CityEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CoachEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CommentaryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FilterEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FixtureEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\LeagueEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\LivescoreEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\MarketEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\PlayerEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\PreMatchOddEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RefereeEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RivalEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RoundEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ScheduleEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\SeasonEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StageEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StandingEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StateEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StatisticEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamSquadEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TimezoneEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TopscorerEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TransferEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TvStationEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TypeEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\VenueEndpoint;

class SportMonksFootballTest extends AbstractTest
{
    #[DataProvider('provideMethodsData')]
    public function testSportMonksFootballMethods(string $instance, string $methodName)
    {
        $this->assertInstanceOf($instance, $this->givenApi()->$methodName());
    }

    public static function provideMethodsData(): \Generator
    {
        yield 'config' => [Config::class, 'config'];
        yield 'bookmakers' => [BookmakerEndpoint::class, 'bookmakers'];
        yield 'cities' => [CityEndpoint::class, 'cities'];
        yield 'coaches' => [CoachEndpoint::class, 'coaches'];
        yield 'commentaries' => [CommentaryEndpoint::class, 'commentaries'];
        yield 'continents' => [ContinentEndpoint::class, 'continents'];
        yield 'countries' => [CountryEndpoint::class, 'countries'];
        yield 'filters' => [FilterEndpoint::class, 'filters'];
        yield 'fixtures' => [FixtureEndpoint::class, 'fixtures'];
        yield 'leagues' => [LeagueEndpoint::class, 'leagues'];
        yield 'livescores' => [LivescoreEndpoint::class, 'livescores'];
        yield 'markets' => [MarketEndpoint::class, 'markets'];
        yield 'players' => [PlayerEndpoint::class, 'players'];
        yield 'pre-match odds' => [PreMatchOddEndpoint::class, 'preMatchOdds'];
        yield 'referees' => [RefereeEndpoint::class, 'referees'];
        yield 'regions' => [RegionEndpoint::class, 'regions'];
        yield 'rivals' => [RivalEndpoint::class, 'rivals'];
        yield 'rounds' => [RoundEndpoint::class, 'rounds'];
        yield 'schedules' => [ScheduleEndpoint::class, 'schedules'];
        yield 'seasons' => [SeasonEndpoint::class, 'seasons'];
        yield 'stages' => [StageEndpoint::class, 'stages'];
        yield 'standings' => [StandingEndpoint::class, 'standings'];
        yield 'states' => [StateEndpoint::class, 'states'];
        yield 'statistics' => [StatisticEndpoint::class, 'statistics'];
        yield 'teams' => [TeamEndpoint::class, 'teams'];
        yield 'team squads' => [TeamSquadEndpoint::class, 'teamSquads'];
        yield 'timezones' => [TimezoneEndpoint::class, 'timezones'];
        yield 'topscorers' => [TopscorerEndpoint::class, 'topscorers'];
        yield 'transfers' => [TransferEndpoint::class, 'transfers'];
        yield 'tv stations' => [TvStationEndpoint::class, 'tvStations'];
        yield 'types' => [TypeEndpoint::class, 'types'];
        yield 'venues' => [VenueEndpoint::class, 'venues'];
    }
}