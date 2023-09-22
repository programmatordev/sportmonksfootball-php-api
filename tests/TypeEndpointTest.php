<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class TypeEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::TYPE_ITEM_DATA,
            'types',
            'getById',
            [1],
            Type::class,
            'assertTypeResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::TYPE_COLLECTION_DATA,
            'types',
            'getAll',
            [],
            Type::class,
            'assertTypeResponse'
        ];
        yield 'get all by entity' => [
            MockResponse::TYPE_ENTITY_COLLECTION_DATA,
            'types',
            'getAllByEntity',
            [],
            TypeEntity::class,
            'assertEntityResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['types', 'getAll', []];
    }

    private function assertTypeResponse(Type $type): void
    {
        $this->assertSame(1, $type->getId());
        $this->assertSame('1st Half', $type->getName());
        $this->assertSame('1st-half', $type->getCode());
        $this->assertSame('1ST_HALF', $type->getDeveloperName());
        $this->assertSame('period', $type->getModelType());
        $this->assertSame(null, $type->getStatGroup());
    }

    private function assertEntityResponse(TypeEntity $entity): void
    {
        $this->assertSame('CoachStatisticDetail', $entity->getName());
        $this->assertSame('2023-09-21 16:20:39', $entity->getUpdatedAt()->format('Y-m-d H:i:s'));
        $this->assertContainsOnlyInstancesOf(Type::class, $entity->getTypes());
    }
}