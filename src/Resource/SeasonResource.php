<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\SeasonCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\SeasonItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class SeasonResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): SeasonCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/seasons'
        );

        return new SeasonCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): SeasonItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/seasons/{id}', [
                'id' => $id
            ])
        );

        return new SeasonItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): SeasonCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/seasons/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new SeasonCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): SeasonCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/seasons/search/{query}', [
                'query' => $query
            ])
        );

        return new SeasonCollection($data);
    }
}