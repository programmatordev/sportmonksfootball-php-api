<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidDateRangeTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class TransferEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;
    use TestEndpointInvalidDateRangeTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::TRANSFER_ITEM_DATA,
            'transfers',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAll',
            []
        ];
        yield 'get all latest' => [
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllLatest',
            []
        ];
        yield 'get all by date range' => [
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByDateRange',
            [new \DateTime('yesterday'), new \DateTime('today')]
        ];
        yield 'get all by team id' => [
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all by player id' => [
            MockResponse::TRANSFER_COLLECTION_DATA,
            'transfers',
            'getAllByPlayerId',
            [1]
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['transfers', 'getAll', []];
        yield 'get all latest' => ['transfers', 'getAllLatest', []];
        yield 'get all by date range' => ['transfers', 'getAllByDateRange', [new \DateTime('yesterday'), new \DateTime('today')]];
        yield 'get all by team id' => ['transfers', 'getAllByTeamId', [1]];
        yield 'get all by player id' => ['transfers', 'getAllByPlayerId', [1]];
    }

    public static function provideEndpointInvalidDateRangeData(): \Generator
    {
        yield 'get all by date range, start date greater than end date' => [
            'transfers',
            'getAllByDateRange',
            [new \DateTime('-5 days'), new \DateTime('-10 days')]
        ];
        yield 'get all by date range, end date greater than today date' => [
            'transfers',
            'getAllByDateRange',
            [new \DateTime('yesterday'), new \DateTime('tomorrow')]
        ];
        yield 'get all by date range, date range greater than 31 days' => [
            'transfers',
            'getAllByDateRange',
            [new \DateTime('-32 days'), new \DateTime('today')]
        ];
    }


    private function assertResponse(Transfer $transfer): void
    {
        $this->assertSame(1, $transfer->getId());
        $this->assertSame(1, $transfer->getSportId());
        $this->assertSame(35659846, $transfer->getPlayerId());
        $this->assertSame(219, $transfer->getTypeId());
        $this->assertSame(148048, $transfer->getFromTeamId());
        $this->assertSame(3736, $transfer->getToTeamId());
        $this->assertSame(25, $transfer->getPositionId());
        $this->assertSame(154, $transfer->getDetailedPositionId());
        $this->assertSame('2021-12-27 00:00:00', $transfer->getDate()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $transfer->hasCareerEnded());
        $this->assertSame(true, $transfer->isCompleted());
        $this->assertSame(909000, $transfer->getAmount());
    }
}