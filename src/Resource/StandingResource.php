<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StandingCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StandingCorrectionCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class StandingResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): StandingCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/standings'
        );

        return new StandingCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): StandingCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/standings/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new StandingCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllCorrectionsBySeasonId(int $seasonId): StandingCorrectionCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/standings/corrections/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new StandingCorrectionCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByRoundId(int $roundId): StandingCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/standings/rounds/{roundId}', [
                'roundId' => $roundId
            ])
        );

        return new StandingCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLiveByLeagueId(int $leagueId): StandingCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/standings/live/leagues/{leagueId}', [
                'leagueId' => $leagueId
            ])
        );

        return new StandingCollection($data);
    }
}