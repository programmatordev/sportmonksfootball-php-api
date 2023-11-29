<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamSquadCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;

class TeamSquadEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;

    protected int $cacheTtl = 3600 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByTeamId(int $teamId): TeamSquadCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/squads/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new TeamSquadCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllExtendedByTeamId(int $teamId): PlayerCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/squads/teams/{teamId}/extended', [
                'teamId' => $teamId
            ])
        );

        return new PlayerCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): TeamSquadCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/football/squads/seasons/{seasonId}/teams/{teamId}', [
                'seasonId' => $seasonId,
                'teamId' => $teamId
            ])
        );

        return new TeamSquadCollection($response);
    }
}