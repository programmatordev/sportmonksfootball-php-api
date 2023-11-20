<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Rival;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class RivalEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::RIVAL_COLLECTION_DATA,
            'rivals',
            'getAll',
            []
        ];
        yield 'get all by team id' => [
            MockResponse::RIVAL_COLLECTION_DATA,
            'rivals',
            'getAllByTeamId',
            [1]
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['rivals', 'getAll', []];
    }

    private function assertResponse(Rival $rival): void
    {
        $this->assertSame(1, $rival->getId());
        $this->assertSame(1, $rival->getSportId());
        $this->assertSame(2706, $rival->getTeamId());
        $this->assertSame(1020, $rival->getRivalId());
    }
}