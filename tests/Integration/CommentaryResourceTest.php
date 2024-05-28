<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CommentaryCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class CommentaryResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            CommentaryCollection::class,
            MockResponse::COMMENTARY_COLLECTION_DATA,
            'commentaries',
            'getAll'
        ];
        yield 'get all by fixture id' => [
            CommentaryCollection::class,
            MockResponse::COMMENTARY_COLLECTION_DATA,
            'commentaries',
            'getAllByFixtureId',
            [1]
        ];
    }
}