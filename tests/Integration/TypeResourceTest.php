<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeEntityCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class TypeResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            TypeItem::class,
            MockResponse::TYPE_ITEM_DATA,
            'types',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            TypeCollection::class,
            MockResponse::TYPE_COLLECTION_DATA,
            'types',
            'getAll'
        ];
        yield 'get all by entity' => [
            TypeEntityCollection::class,
            MockResponse::TYPE_ENTITY_COLLECTION_DATA,
            'types',
            'getAllByEntity'
        ];
    }
}