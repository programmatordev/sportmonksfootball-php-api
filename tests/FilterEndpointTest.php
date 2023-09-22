<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\FilterEntity;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;

class FilterEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all by entity' => [
            MockResponse::FILTER_ENTITY_COLLECTION_DATA,
            'filters',
            'getAllByEntity',
            [],
            FilterEntity::class,
            'assertResponse'
        ];
    }

    private function assertResponse(FilterEntity $entity): void
    {
        $this->assertSame('aggregate', $entity->getName());
        $this->assertSame(['aggregateLeagues', 'aggregateSeasons', 'aggregateStages'], $entity->getFilters());
    }
}