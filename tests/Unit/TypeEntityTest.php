<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TypeEntityTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TypeEntity([
            '_key' => 'PlayerStatisticDetail',
            'updated_at' => '2024-01-01 16:00:00',
            'types' => [
                [
                    'id' => 1,
                    'name' => '1st Half',
                    'code' => '1st-half',
                    'developer_name' => '1ST_HALF',
                    'model_type' => 'period',
                    'stat_group' => 'overall'
                ]
            ]
        ]);

        $this->assertSame('PlayerStatisticDetail', $entity->getName());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getUpdatedAt());
        $this->assertContainsOnlyInstancesOf(Type::class, $entity->getTypes());
    }
}
