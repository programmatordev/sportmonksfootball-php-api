<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidSearchQueryTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class CoachEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidSearchQueryTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::COACH_ITEM_DATA,
            'coaches',
            'getById',
            [1],
            Coach::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAll',
            [],
            Coach::class,
            'assertResponse'
        ];
        yield 'get all by country id' => [
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllByCountryId',
            [1],
            Coach::class,
            'assertResponse'
        ];
        yield 'get all by search query' => [
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllBySearchQuery',
            ['test'],
            Coach::class,
            'assertResponse'
        ];
        yield 'get all last updated' => [
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllLastUpdated',
            [],
            Coach::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['coaches', 'getAll', []];
        yield 'get all by country id' => ['coaches', 'getAllByCountryId', [1]];
        yield 'get all by search query' => ['coaches', 'getAllBySearchQuery', ['test']];
    }

    public static function provideEndpointInvalidSearchQueryData(): \Generator
    {
        yield 'get all by search query' => ['coaches', 'getAllBySearchQuery'];
    }

    private function assertResponse(Coach $coach): void
    {
        $this->assertSame(50, $coach->getId());
        $this->assertSame(50, $coach->getPlayerId());
        $this->assertSame(1, $coach->getSportId());
        $this->assertSame(462, $coach->getCountryId());
        $this->assertSame(462, $coach->getNationalityId());
        $this->assertSame(null, $coach->getCityId());
        $this->assertSame('S. Gerrard', $coach->getCommonName());
        $this->assertSame('Steven', $coach->getFirstName());
        $this->assertSame('Gerrard', $coach->getLastName());
        $this->assertSame('Steven Gerrard', $coach->getName());
        $this->assertSame('Steven Gerrard', $coach->getDisplayName());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/players/18/50.png', $coach->getImagePath());
        $this->assertSame(183, $coach->getHeight());
        $this->assertSame(83, $coach->getWeight());
        $this->assertSame('1980-05-30 00:00:00', $coach->getDateOfBirth()->format('Y-m-d H:i:s'));
        $this->assertSame('male', $coach->getGender());
    }
}