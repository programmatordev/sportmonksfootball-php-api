<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Metadata;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class MetadataTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Metadata([
            'id' => 1,
            'metadatable_id' => 1,
            'type_id' => 1,
            'value_type' => 'object',
            'values' => ['neutral' => false]
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getMetadatableId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame('object', $entity->getValueType());
        $this->assertSame(['neutral' => false], $entity->getValues());
    }
}