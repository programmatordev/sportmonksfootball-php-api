<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Topscorer;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class TopscorerEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all by season id' => [
            MockResponse::TOPSCORER_COLLECTION_DATA,
            'topscorers',
            'getAllBySeasonId',
            [1],
            Topscorer::class,
            'assertResponse'
        ];
        yield 'get all by stage id' => [
            MockResponse::TOPSCORER_COLLECTION_DATA,
            'topscorers',
            'getAllByStageId',
            [1],
            Topscorer::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all by season id' => ['topscorers', 'getAllBySeasonId', [1]];
        yield 'get all by stage id' => ['topscorers', 'getAllByStageId', [1]];
    }

    private function assertResponse(Topscorer $topscorer): void
    {
        $this->assertSame(1540882, $topscorer->getId());
        $this->assertSame(19735, $topscorer->getSeasonId());
        $this->assertSame(37305554, $topscorer->getPlayerId());
        $this->assertSame(83, $topscorer->getTypeId());
        $this->assertSame(246, $topscorer->getParticipantId());
        $this->assertSame(1, $topscorer->getPosition());
        $this->assertSame(3, $topscorer->getTotal());
    }
}