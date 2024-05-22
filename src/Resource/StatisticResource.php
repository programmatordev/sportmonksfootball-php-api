<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class StatisticResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByPlayerId(int $playerId): PlayerStatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/seasons/players/{playerId}', [
                'playerId' => $playerId
            ])
        );

        return new PlayerStatisticCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): TeamStatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/seasons/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new TeamStatisticCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCoachId(int $coachId): CoachStatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/seasons/coaches/{coachId}', [
                'coachId' => $coachId
            ])
        );

        return new CoachStatisticCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByRefereeId(int $refereeId): RefereeStatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/seasons/referees/{refereeId}', [
                'refereeId' => $refereeId
            ])
        );

        return new RefereeStatisticCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByStageId(int $stageId): StatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/stages/{stageId}', [
                'stageId' => $stageId
            ])
        );

        return new StatisticCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByRoundId(int $roundId): StatisticCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/statistics/rounds/{roundId}', [
                'roundId' => $roundId
            ])
        );

        return new StatisticCollection($data);
    }
}