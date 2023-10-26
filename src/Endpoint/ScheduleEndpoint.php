<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StageCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;

class ScheduleEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;

    protected int $cacheTtl = 3600; // 1 hour

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllBySeasonId(int $seasonId): StageCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/schedules/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new StageCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByTeamId(int $teamId): StageCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/schedules/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new StageCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): StageCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/schedules/seasons/{seasonId}/teams/{teamId}', [
                'seasonId' => $seasonId,
                'teamId' => $teamId
            ])
        );

        return new StageCollection($response);
    }
}