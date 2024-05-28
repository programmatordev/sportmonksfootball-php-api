<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Odd;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class OddTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Odd([
            'id' => 1,
            'fixture_id' => 1,
            'market_id' => 1,
            'bookmaker_id' => 1,
            'label' => '1',
            'value' => '1',
            'name' => '1',
            'sort_order' => 1,
            'market_description' => 'market description',
            'probability' => '50%',
            'dp3' => '1.770',
            'fractional' => '23/13',
            'american' => '-130',
            'winning' => true,
            'stopped' => false,
            'total' => '0.5',
            'handicap' => '0.5',
            'participants' => '1000',
            'created_at' => '2024-01-01 16:00:00',
            'updated_at' => '2024-01-01 17:00:00',
            'original_label' => 'original label',
            'latest_bookmaker_update' => '2024-01-01 17:00:00'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getMarketId());
        $this->assertSame(1, $entity->getBookmakerId());
        $this->assertSame('1', $entity->getLabel());
        $this->assertSame('1', $entity->getValue());
        $this->assertSame('1', $entity->getName());
        $this->assertSame(1, $entity->getSortOrder());
        $this->assertSame('market description', $entity->getMarketDescription());
        $this->assertSame('50%', $entity->getProbability());
        $this->assertSame('1.770', $entity->getDp3());
        $this->assertSame('23/13', $entity->getFractional());
        $this->assertSame('-130', $entity->getAmerican());
        $this->assertSame(true, $entity->isWinning());
        $this->assertSame(false, $entity->hasStopped());
        $this->assertSame('0.5', $entity->getTotal());
        $this->assertSame('0.5', $entity->getHandicap());
        $this->assertSame('1000', $entity->getParticipants());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getCreatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getUpdatedAt());
        $this->assertSame('original label', $entity->getOriginalLabel());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getLatestBookmakerUpdatedAt());
    }
}