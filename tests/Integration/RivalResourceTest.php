<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RivalCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class RivalResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            RivalCollection::class,
            MockResponse::RIVAL_COLLECTION_DATA,
            'rivals',
            'getAll'
        ];
        yield 'get all by team id' => [
            RivalCollection::class,
            MockResponse::RIVAL_COLLECTION_DATA,
            'rivals',
            'getAllByTeamId',
            [1]
        ];
    }
}