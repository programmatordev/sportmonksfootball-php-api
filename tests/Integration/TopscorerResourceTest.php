<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TopscorerCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class TopscorerResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all by season id' => [
            TopscorerCollection::class,
            MockResponse::TOPSCORER_COLLECTION_DATA,
            'topscorers',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by stage id' => [
            TopscorerCollection::class,
            MockResponse::TOPSCORER_COLLECTION_DATA,
            'topscorers',
            'getAllByStageId',
            [1]
        ];
    }
}