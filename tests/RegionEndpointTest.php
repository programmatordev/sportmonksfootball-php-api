<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class RegionEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::REGION_ITEM_DATA,
            'regions',
            'getById',
            [1],
            Region::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::REGION_COLLECTION_DATA,
            'regions',
            'getAll',
            [],
            Region::class,
            'assertResponse'
        ];
        yield 'get by search query' => [
            MockResponse::REGION_COLLECTION_DATA,
            'regions',
            'getBySearchQuery',
            ['test'],
            Region::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['regions', 'getAll', []];
        yield 'get by search query' => ['regions', 'getBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get by search query' => ['regions', 'getBySearchQuery'];
    }

    private function assertResponse(Region $region): void
    {
        $this->assertSame(1, $region->getId());
        $this->assertSame(107, $region->getCountryId());
        $this->assertSame('Al Qadisiyah', $region->getName());
    }
}