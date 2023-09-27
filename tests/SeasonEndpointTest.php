<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Season;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class SeasonEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::SEASON_ITEM_DATA,
            'seasons',
            'getById',
            [1],
            Season::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAll',
            [],
            Season::class,
            'assertResponse'
        ];
        yield 'get all by team id' => [
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAllByTeamId',
            [1],
            Season::class,
            'assertResponse'
        ];
        yield 'get all by search query' => [
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAllBySearchQuery',
            ['test'],
            Season::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['seasons', 'getAll', []];
        yield 'get all by search query' => ['seasons', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['seasons', 'getAllBySearchQuery'];
    }

    private function assertResponse(Season $season): void
    {
        $this->assertSame(759, $season->getId());
        $this->assertSame(1, $season->getSportId());
        $this->assertSame(271, $season->getLeagueId());
        $this->assertSame(169, $season->getTieBreakerRuleId());
        $this->assertSame('2016/2017', $season->getName());
        $this->assertSame(true, $season->isFinished());
        $this->assertSame(false, $season->isPending());
        $this->assertSame(false, $season->isCurrent());
        $this->assertSame('2016-07-15 00:00:00', $season->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-06-01 00:00:00', $season->getEndingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2023-05-24 08:38:01', $season->getStandingsRecalculatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $season->hasGamesInCurrentWeek());
    }
}