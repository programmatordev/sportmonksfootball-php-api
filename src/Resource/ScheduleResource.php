<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StageCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ScheduleResource extends Resource
{
    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): StageCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/schedules/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new StageCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): StageCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/schedules/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new StageCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): StageCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/schedules/seasons/{seasonId}/teams/{teamId}', [
                'seasonId' => $seasonId,
                'teamId' => $teamId
            ])
        );

        return new StageCollection($data);
    }
}