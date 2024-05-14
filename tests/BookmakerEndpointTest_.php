<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class BookmakerEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::BOOKMAKER_ITEM_DATA,
            'bookmakers',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAll',
            []
        ];
        yield 'get all by fixture id' => [
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAllByFixtureId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['bookmakers', 'getAll', []];
        yield 'get all by fixture id' => ['bookmakers', 'getAllByFixtureId', [1]];
        yield 'get all by search query' => ['bookmakers', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['bookmakers', 'getAllBySearchQuery'];
    }

    private function assertResponse(Bookmaker $bookmaker): void
    {
        $this->assertSame(1, $bookmaker->getId());
        $this->assertSame(1, $bookmaker->getLegacyId());
        $this->assertSame('10Bet', $bookmaker->getName());
    }
}