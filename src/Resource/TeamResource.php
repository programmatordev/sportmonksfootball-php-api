<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class TeamResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): TeamCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/teams'
        );

        return new TeamCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): TeamItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/teams/{id}', [
                'id' => $id
            ])
        );

        return new TeamItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCountryId(int $countryId): TeamCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/teams/countries/{countryId}', [
                'countryId' => $countryId
            ])
        );

        return new TeamCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): TeamCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/teams/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new TeamCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): TeamCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/teams/search/{query}', [
                'query' => $query
            ])
        );

        return new TeamCollection($data);
    }
}