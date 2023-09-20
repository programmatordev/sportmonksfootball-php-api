<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\City;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class CityEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::CITY_ITEM_DATA,
            'cities',
            'getById',
            [1],
            City::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::CITY_COLLECTION_DATA,
            'cities',
            'getAll',
            [],
            City::class,
            'assertResponse'
        ];
        yield 'get by search query' => [
            MockResponse::CITY_COLLECTION_DATA,
            'cities',
            'getBySearchQuery',
            ['test'],
            City::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['cities', 'getAll', []];
        yield 'get by search query' => ['cities', 'getBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get by search query' => ['cities', 'getBySearchQuery'];
    }

    private function assertResponse(City $city): void
    {
        $this->assertSame(1, $city->getId());
        $this->assertSame(107, $city->getCountryId());
        $this->assertSame(1, $city->getRegionId());
        $this->assertSame("'Afak", $city->getName());
        $this->assertSame(24.84926, $city->getLatitude());
        $this->assertSame(46.84591, $city->getLongitude());
    }
}