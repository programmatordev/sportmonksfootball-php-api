<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamSquadCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class TeamSquadResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): TeamSquadCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/squads/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new TeamSquadCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllExtendedByTeamId(int $teamId): PlayerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/squads/teams/{teamId}/extended', [
                'teamId' => $teamId
            ])
        );

        return new PlayerCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonIdAndTeamId(int $seasonId, int $teamId): TeamSquadCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/squads/seasons/{seasonId}/teams/{teamId}', [
                'seasonId' => $seasonId,
                'teamId' => $teamId
            ])
        );

        return new TeamSquadCollection($data);
    }
}