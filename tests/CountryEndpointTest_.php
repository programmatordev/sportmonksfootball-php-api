<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class CountryEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::COUNTRY_ITEM_DATA,
            'countries',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::COUNTRY_COLLECTION_DATA,
            'countries',
            'getAll',
            []
        ];
        yield 'get all by search query' => [
            MockResponse::COUNTRY_COLLECTION_DATA,
            'countries',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['countries', 'getAll', []];
        yield 'get all by search query' => ['countries', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['countries', 'getAllBySearchQuery'];
    }

    private function assertResponse(Country $country): void
    {
        $this->assertSame(2, $country->getId());
        $this->assertSame(1, $country->getContinentId());
        $this->assertSame('Poland', $country->getName());
        $this->assertSame('Republic of Poland', $country->getOfficialName());
        $this->assertSame('POL', $country->getFifaName());
        $this->assertSame('PL', $country->getIso2());
        $this->assertSame('POL', $country->getIso3());
        $this->assertSame(52.147850036621094, $country->getLatitude());
        $this->assertSame(19.37775993347168, $country->getLongitude());
        $this->assertSame(["BLR","CZE","DEU","LTU","RUS","SVK","UKR"], $country->getBorders());
        $this->assertSame('https://cdn.sportmonks.com/images/countries/png/short/pl.png', $country->getImagePath());
    }
}