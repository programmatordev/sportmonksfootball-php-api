<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Commentary;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class CommentaryEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::COMMENTARY_COLLECTION_DATA,
            'commentaries',
            'getAll',
            [],
            Commentary::class,
            'assertResponse'
        ];
        yield 'get all by fixture id' => [
            MockResponse::COMMENTARY_COLLECTION_DATA,
            'commentaries',
            'getAllByFixtureId',
            [1],
            Commentary::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['commentaries', 'getAll', []];
    }

    private function assertResponse(Commentary $commentary): void
    {
        $this->assertSame(1, $commentary->getId());
        $this->assertSame(18444499, $commentary->getFixtureId());
        $this->assertSame('First Half starts.', $commentary->getComment());
        $this->assertSame(null, $commentary->getMinute());
        $this->assertSame(null, $commentary->getExtraMinute());
        $this->assertSame(false, $commentary->isGoal());
        $this->assertSame(false, $commentary->isImportant());
        $this->assertSame(1, $commentary->getSortOrder());
    }
}