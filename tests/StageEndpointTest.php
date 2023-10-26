<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class StageEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::STAGE_ITEM_DATA,
            'stages',
            'getById',
            [1],
            Stage::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAll',
            [],
            Stage::class,
            'assertResponse'
        ];
        yield 'get all by season id' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAllBySeasonId',
            [1],
            Stage::class,
            'assertResponse'
        ];
        yield 'get all by search query' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAllBySearchQuery',
            ['test'],
            Stage::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['stages', 'getAll', []];
        yield 'get all by search query' => ['stages', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['stages', 'getAllBySearchQuery'];
    }

    private function assertResponse(Stage $stage): void
    {
        $this->assertSame(1086, $stage->getId());
        $this->assertSame(1, $stage->getSportId());
        $this->assertSame(271, $stage->getLeagueId());
        $this->assertSame(1273, $stage->getSeasonId());
        $this->assertSame(223, $stage->getTypeId());
        $this->assertSame('Regular Season', $stage->getName());
        $this->assertSame(1, $stage->getSortOrder());
        $this->assertSame(true, $stage->hasFinished());
        $this->assertSame(false, $stage->isCurrent());
        $this->assertSame('2005-07-19 00:00:00', $stage->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2006-05-14 00:00:00', $stage->getEndingAt()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $stage->hasGamesInCurrentWeek());
        $this->assertSame(null, $stage->getTieBreakerRuleId());
    }
}