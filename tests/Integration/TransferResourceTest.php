<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TransferCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TransferItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class TransferResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            TransferItem::class,
            MockResponse::TRANSFER_ITEM_DATA,
            'transfers',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            TransferCollection::class,
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAll'
        ];
        yield 'get all latest' => [
            TransferCollection::class,
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllLatest'
        ];
        yield 'get all by date range' => [
            TransferCollection::class,
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByDateRange',
            [new \DateTime('yesterday'), new \DateTime('today')]
        ];
        yield 'get all by team id' => [
            TransferCollection::class,
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all by player id' => [
            TransferCollection::class,
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByPlayerId',
            [1]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by date range, invalid date order' => [
            'transfers',
            'getAllByDateRange',
            [new \DateTime('today'), new \DateTime('yesterday')]
        ];
    }
}