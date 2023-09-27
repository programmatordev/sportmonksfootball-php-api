<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class StateEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::STATE_ITEM_DATA,
            'states',
            'getById',
            [1],
            State::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::STATE_COLLECTION_DATA,
            'states',
            'getAll',
            [],
            State::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['states', 'getAll', []];
    }

    private function assertResponse(State $state): void
    {
        $this->assertSame(1, $state->getId());
        $this->assertSame('NS', $state->getState());
        $this->assertSame('Not Started', $state->getName());
        $this->assertSame('NS', $state->getShortName());
        $this->assertSame('NS', $state->getDeveloperName());
    }
}