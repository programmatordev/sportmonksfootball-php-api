<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Team;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class TeamEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::TEAM_ITEM_DATA,
            'teams',
            'getById',
            [1],
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAll',
            []
        ];
        yield 'get all by country id' => [
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by season id' => [
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['teams', 'getAll', []];
        yield 'get all by country id' => ['teams', 'getAllByCountryId', [1]];
        yield 'get all by search query' => ['teams', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['teams', 'getAllBySearchQuery'];
    }

    private function assertResponse(Team $team): void
    {
        $this->assertSame(53, $team->getId());
        $this->assertSame(1, $team->getSportId());
        $this->assertSame(1161, $team->getCountryId());
        $this->assertSame(8909, $team->getVenueId());
        $this->assertSame('male', $team->getGender());
        $this->assertSame('Celtic', $team->getName());
        $this->assertSame('CEL', $team->getShortCode());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/teams/21/53.png', $team->getImagePath());
        $this->assertSame(1888, $team->getFoundedAt());
        $this->assertSame('domestic', $team->getType());
        $this->assertSame(false, $team->isPlaceholder());
        $this->assertSame('2023-09-30 11:30:00', $team->getLastPlayedAt()->format('Y-m-d H:i:s'));
    }
}