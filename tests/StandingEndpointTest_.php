<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Standing;
use ProgrammatorDev\SportMonksFootball\Entity\StandingCorrection;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class StandingEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAll',
            [],
            'assertStandingResponse'
        ];
        yield 'get all by season id' => [
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllBySeasonId',
            [1],
            'assertStandingResponse'
        ];
        yield 'get all corrections by season id' => [
            MockResponse::STANDING_CORRECTION_COLLECTION_DATA,
            'standings',
            'getAllCorrectionsBySeasonId',
            [1],
            'assertStandingCorrectionResponse'
        ];
        yield 'get all by round id' => [
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllByRoundId',
            [1],
            'assertStandingResponse'
        ];
        yield 'get all live by league id' => [
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllLiveByLeagueId',
            [1],
            'assertStandingResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['standings', 'getAll', []];
    }

    private function assertStandingResponse(Standing $standing): void
    {
        $this->assertSame(2621, $standing->getId());
        $this->assertSame(273, $standing->getParticipantId());
        $this->assertSame(1, $standing->getSportId());
        $this->assertSame(501, $standing->getLeagueId());
        $this->assertSame(19735, $standing->getSeasonId());
        $this->assertSame(77457866, $standing->getStageId());
        $this->assertSame(null, $standing->getGroupId());
        $this->assertSame(275098, $standing->getRoundId());
        $this->assertSame(13222, $standing->getStandingRuleId());
        $this->assertSame(3, $standing->getPosition());
        $this->assertSame('equal', $standing->getResult());
        $this->assertSame(53, $standing->getPoints());
    }

    private function assertStandingCorrectionResponse(StandingCorrection $standingCorrection): void
    {
        $this->assertSame(2324984, $standingCorrection->getId());
        $this->assertSame(19735, $standingCorrection->getSeasonId());
        $this->assertSame(77457865, $standingCorrection->getStageId());
        $this->assertSame(null, $standingCorrection->getGroupId());
        $this->assertSame(173, $standingCorrection->getTypeId());
        $this->assertSame(309, $standingCorrection->getParticipantId());
        $this->assertSame('team', $standingCorrection->getParticipantType());
        $this->assertSame(37, $standingCorrection->getValue());
        $this->assertSame('+', $standingCorrection->getCalcType());
        $this->assertSame(false, $standingCorrection->isActive());
    }
}