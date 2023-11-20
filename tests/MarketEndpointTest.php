<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Market;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class MarketEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::MARKET_ITEM_DATA,
            'markets',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::MARKET_COLLECTION_DATA,
            'markets',
            'getAll',
            []
        ];
        yield 'get all by search query' => [
            MockResponse::MARKET_COLLECTION_DATA,
            'markets',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['markets', 'getAll', []];
        yield 'get all by search query' => ['markets', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['markets', 'getAllBySearchQuery'];
    }

    private function assertResponse(Market $market): void
    {
        $this->assertSame(1, $market->getId());
        $this->assertSame(1, $market->getLegacyId());
        $this->assertSame('Fulltime Result', $market->getName());
        $this->assertSame('FULLTIME_RESULT', $market->getDeveloperName());
        $this->assertSame(true, $market->hasWinningCalculations());
    }
}