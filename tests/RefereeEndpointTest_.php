<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Referee;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class RefereeEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::REFEREE_ITEM_DATA,
            'referees',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAll',
            []
        ];
        yield 'get all by country id' => [
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by season id' => [
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['referees', 'getAll', []];
        yield 'get all by country id' => ['referees', 'getAllByCountryId', [1]];
        yield 'get all by season id' => ['referees', 'getAllBySeasonId', [1]];
        yield 'get all by search query' => ['referees', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['referees', 'getAllBySearchQuery'];
    }

    private function assertResponse(Referee $referee): void
    {
        $this->assertSame(37, $referee->getId());
        $this->assertSame(1, $referee->getSportId());
        $this->assertSame(null, $referee->getCountryId());
        $this->assertSame(null, $referee->getCityId());
        $this->assertSame('Craig Alexander Thomson', $referee->getCommonName());
        $this->assertSame(null, $referee->getFirstName());
        $this->assertSame(null, $referee->getLastName());
        $this->assertSame('Craig Alexander Thomson', $referee->getName());
        $this->assertSame('Craig Alexander Thomson', $referee->getDisplayName());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/placeholder.png', $referee->getImagePath());
        $this->assertSame(null, $referee->getHeight());
        $this->assertSame(null, $referee->getWeight());
        $this->assertSame(null, $referee->getDateOfBirth());
        $this->assertSame(null, $referee->getGender());
    }
}