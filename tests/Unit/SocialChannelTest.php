<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\SocialChannel;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SocialChannelTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new SocialChannel([
            'id' => 1,
            'name' => 'name',
            'base_url' => 'https://base.url',
            'hex_color' => '#666'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('https://base.url', $entity->getBaseUrl());
        $this->assertSame('#666', $entity->getHexColor());
    }
}