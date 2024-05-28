<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Social;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SocialTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Social([
            'id' => 1,
            'social_id' => 1,
            'social_channel_id' => 1,
            'value' => '@value'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSocialId());
        $this->assertSame(1, $entity->getSocialChannelId());
        $this->assertSame('@value', $entity->getValue());
    }
}