<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\LeagueCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\LeagueItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class LeagueResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/leagues'
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): LeagueItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/{id}', [
                'id' => $id
            ])
        );

        return new LeagueItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLive(): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/leagues/live'
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureDate(\DateTimeInterface $date): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/date/{date}', [
                'date' => $date->format('Y-m-d')
            ])
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCountryId(int $countryId): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/countries/{countryId}', [
                'countryId' => $countryId
            ])
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): LeagueCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/search/{query}', [
                'query' => $query
            ])
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new LeagueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllCurrentByTeamId(int $teamId): LeagueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/leagues/teams/{teamId}/current', [
                'teamId' => $teamId
            ])
        );

        return new LeagueCollection($data);
    }
}