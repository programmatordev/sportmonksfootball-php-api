<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Round;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class RoundEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::ROUND_ITEM_DATA,
            'rounds',
            'getById',
            [1],
            Round::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAll',
            [],
            Round::class,
            'assertResponse'
        ];
        yield 'get all by season id' => [
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAllBySeasonId',
            [1],
            Round::class,
            'assertResponse'
        ];
        yield 'get all by search query' => [
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAllBySearchQuery',
            ['test'],
            Round::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['rounds', 'getAll', []];
        yield 'get all by search query' => ['rounds', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['rounds', 'getAllBySearchQuery'];
    }

    private function assertResponse(Round $round): void
    {
        $this->assertSame(23317, $round->getId());
        $this->assertSame(1, $round->getSportId());
        $this->assertSame(271, $round->getLeagueId());
        $this->assertSame(1273, $round->getSeasonId());
        $this->assertSame('1', $round->getName());
        $this->assertSame(true, $round->hasFinished());
        $this->assertSame(false, $round->isCurrent());
        $this->assertSame('2005-07-19 00:00:00', $round->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2005-07-24 00:00:00', $round->getEndingAt()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $round->hasGamesInCurrentWeek());
    }
}