<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidDateRangeTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class FixtureEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;
    use TestEndpointInvalidDateRangeTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::FIXTURE_ITEM_DATA,
            'fixtures',
            'getById',
            [1],
            Fixture::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAll',
            [],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by multiple ids' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByMultipleIds',
            [[1, 2]],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by date' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByDate',
            [new \DateTime('today')],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by date range' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByDateRange',
            [new \DateTime('today'), new \DateTime('tomorrow')],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by team id and date range' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByTeamIdAndDateRange',
            [1, new \DateTime('today'), new \DateTime('tomorrow')],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by head to head' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByHeadToHead',
            [1, 2],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all by search query' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllBySearchQuery',
            ['test'],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all upcoming by market id' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllUpcomingByMarketId',
            [1],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all upcoming by tv station id' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllUpcomingByTvStationId',
            [1],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all past by tv station id' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllPastByTvStationId',
            [1],
            Fixture::class,
            'assertResponse'
        ];
        yield 'get all last updated' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllLastUpdated',
            [],
            Fixture::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['fixtures', 'getAll', []];
        yield 'get all by date' => ['fixtures', 'getAllByDate', [new \DateTime('today')]];
        yield 'get all by date range' => ['fixtures', 'getAllByDateRange', [new \DateTime('today'), new \DateTime('tomorrow')]];
        yield 'get all by team id and date range' => ['fixtures', 'getAllByTeamIdAndDateRange', [1, new \DateTime('today'), new \DateTime('tomorrow')]];
        yield 'get all by search query' => ['fixtures', 'getAllBySearchQuery', ['test']];
        yield 'get all upcoming by market id' => ['fixtures', 'getAllUpcomingByMarketId', [1]];
        yield 'get all upcoming by tv station id' => ['fixtures', 'getAllUpcomingByTvStationId', [1]];
        yield 'get all past by tv station id' => ['fixtures', 'getAllPastByTvStationId', [1]];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['fixtures', 'getAllBySearchQuery'];
    }

    public static function provideEndpointInvalidDateRangeData(): \Generator
    {
        yield 'get all by date range, start date greater than end date' => [
            'fixtures',
            'getAllByDateRange',
            [new \DateTime('-5 days'), new \DateTime('-10 days')]
        ];
        yield 'get all by team id and date range, start date greater than end date' => [
            'fixtures',
            'getAllByTeamIdAndDateRange',
            [1, new \DateTime('-5 days'), new \DateTime('-10 days')]
        ];
    }

    private function assertResponse(Fixture $fixture): void
    {
        $this->assertSame(216268, $fixture->getId());
        $this->assertSame(1, $fixture->getSportId());
        $this->assertSame(271, $fixture->getLeagueId());
        $this->assertSame(1273, $fixture->getSeasonId());
        $this->assertSame(1086, $fixture->getStageId());
        $this->assertSame(null, $fixture->getGroupId());
        $this->assertSame(null, $fixture->getAggregateId());
        $this->assertSame(23332, $fixture->getRoundId());
        $this->assertSame(5, $fixture->getStateId());
        $this->assertSame(618, $fixture->getVenueId());
        $this->assertSame('Esbjerg vs OB', $fixture->getName());
        $this->assertSame('2006-03-25 16:00:00', $fixture->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('Esbjerg won after full-time.', $fixture->getResultInfo());
        $this->assertSame('1/1', $fixture->getLeg());
        $this->assertSame(null, $fixture->getDetails());
        $this->assertSame(90, $fixture->getLength());
        $this->assertSame(false, $fixture->isPlaceholder());
        $this->assertSame(false, $fixture->hasOdds());
    }
}