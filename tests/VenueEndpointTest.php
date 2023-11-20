<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class VenueEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::VENUE_ITEM_DATA,
            'venues',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAll',
            []
        ];
        yield 'get all by season id' => [
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['venues', 'getAll', []];
        yield 'get all by search query' => ['venues', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['venues', 'getAllBySearchQuery'];
    }

    private function assertResponse(Venue $venue): void
    {
        $this->assertSame(73, $venue->getId());
        $this->assertSame(1004, $venue->getCountryId());
        $this->assertSame(66569, $venue->getCityId());
        $this->assertSame('The Paisley 2021 Stadium', $venue->getName());
        $this->assertSame('Greenhill Road', $venue->getAddress());
        $this->assertSame(null, $venue->getZipCode());
        $this->assertSame(53.4139488, $venue->getLatitude());
        $this->assertSame(-113.559332, $venue->getLongitude());
        $this->assertSame(8023, $venue->getCapacity());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/venues/9/73.png', $venue->getImagePath());
        $this->assertSame('Paisley', $venue->getCityName());
        $this->assertSame('grass', $venue->getSurface());
        $this->assertSame(false, $venue->isNationalTeam());
    }
}