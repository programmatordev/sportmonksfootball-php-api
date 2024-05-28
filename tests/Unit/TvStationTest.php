<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TvStationTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TvStation([
            'id' => 1,
            'name' => 'name',
            'url' => 'https://url.com',
            'image_path' => 'https://image.path',
            'type' => 'tv',
            'related_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('https://url.com', $entity->getUrl());
        $this->assertSame('https://image.path', $entity->getImagePath());
        $this->assertSame('tv', $entity->getType());
        $this->assertSame(1, $entity->getRelatedId());
    }
}
