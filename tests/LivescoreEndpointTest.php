<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;

class LivescoreEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAll',
            []
        ];
        yield 'get all inplay' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAllInplay',
            []
        ];
        yield 'get all last updated' => [
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAllLastUpdated',
            []
        ];
    }

    private function assertResponse(Fixture $fixture): void
    {
        $this->assertSame(216268, $fixture->getId());
        $this->assertSame(1, $fixture->getSportId());
        $this->assertSame(271, $fixture->getLeagueId());
        $this->assertSame(1273, $fixture->getSeasonId());
        $this->assertSame(1086, $fixture->getStageId());
        $this->assertSame(null, $fixture->getGroupId());
        $this->assertSame(null, $fixture->getAggregateId());
        $this->assertSame(23332, $fixture->getRoundId());
        $this->assertSame(5, $fixture->getStateId());
        $this->assertSame(618, $fixture->getVenueId());
        $this->assertSame('Esbjerg vs OB', $fixture->getName());
        $this->assertSame('2006-03-25 16:00:00', $fixture->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('Esbjerg won after full-time.', $fixture->getResultInfo());
        $this->assertSame('1/1', $fixture->getLeg());
        $this->assertSame(null, $fixture->getDetails());
        $this->assertSame(90, $fixture->getLength());
        $this->assertSame(false, $fixture->isPlaceholder());
        $this->assertSame(false, $fixture->hasOdds());
    }
}