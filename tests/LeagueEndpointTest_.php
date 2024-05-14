<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\League;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class LeagueEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::LEAGUE_ITEM_DATA,
            'leagues',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAll',
            []
        ];
        yield 'get all live' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllLive',
            []
        ];
        yield 'get all by fixture date' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByFixtureDate',
            [new \DateTime('today')]
        ];
        yield 'get all by country id' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllBySearchQuery',
            ['test']
        ];
        yield 'get all by team id' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all current by team id' => [
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllCurrentByTeamId',
            [1]
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['leagues', 'getAll', []];
        yield 'get all by fixture date' => ['leagues', 'getAllByFixtureDate', [new \DateTime('today')]];
        yield 'get all by country id' => ['leagues', 'getAllByCountryId', [1]];
        yield 'get all by search query' => ['leagues', 'getAllBySearchQuery', ['test']];
        yield 'get all by team id' => ['leagues', 'getAllByTeamId', [1]];
        yield 'get all current by team id' => ['leagues', 'getAllCurrentByTeamId', [1]];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['leagues', 'getAllBySearchQuery'];
    }

    private function assertResponse(League $league): void
    {
        $this->assertSame(271, $league->getId());
        $this->assertSame(1, $league->getSportId());
        $this->assertSame(320, $league->getCountryId());
        $this->assertSame('Superliga', $league->getName());
        $this->assertSame(true, $league->isActive());
        $this->assertSame('DNK SL', $league->getShortCode());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/leagues/271.png', $league->getImagePath());
        $this->assertSame('league', $league->getType());
        $this->assertSame('domestic', $league->getSubType());
        $this->assertSame('2023-09-25 17:00:00', $league->getLastPlayedAt()->format('Y-m-d H:i:s'));
        $this->assertSame(2, $league->getCategory());
        $this->assertSame(false, $league->hasJerseys());
    }
}