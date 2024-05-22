<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StateCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StateItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class StateResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            StateItem::class,
            MockResponse::STATE_ITEM_DATA,
            'states',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            StateCollection::class,
            MockResponse::STATE_COLLECTION_DATA,
            'states',
            'getAll'
        ];
    }
}