<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Temperature;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TemperatureTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Temperature([
            'morning' => 10,
            'day' => 15,
            'evening' => 15,
            'night' => 10
        ]);

        $this->assertSame(10.0, $entity->getMorning());
        $this->assertSame(15.0, $entity->getDay());
        $this->assertSame(15.0, $entity->getEvening());
        $this->assertSame(10.0, $entity->getNight());
    }
}