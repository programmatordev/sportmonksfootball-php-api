<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\FilterEntity;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FilterEntityTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new FilterEntity([
            '_key' => 'name',
            0 => 'filter_1',
            1 => 'filter_2'
        ]);

        $this->assertSame('name', $entity->getName());
        $this->assertSame(['filter_1', 'filter_2'], $entity->getFilters());
    }
}