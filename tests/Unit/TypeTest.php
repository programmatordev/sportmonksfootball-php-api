<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TypeTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Type([
            'id' => 1,
            'name' => '1st Half',
            'code' => '1st-half',
            'developer_name' => '1ST_HALF',
            'model_type' => 'period',
            'stat_group' => 'overall'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame('1st Half', $entity->getName());
        $this->assertSame('1st-half', $entity->getCode());
        $this->assertSame('1ST_HALF', $entity->getDeveloperName());
        $this->assertSame('period', $entity->getModelType());
        $this->assertSame('overall', $entity->getStatGroup());
    }
}
