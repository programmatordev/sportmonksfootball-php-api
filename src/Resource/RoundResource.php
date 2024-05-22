<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RoundCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RoundItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class RoundResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): RoundCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/rounds'
        );

        return new RoundCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): RoundItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/rounds/{id}', [
                'id' => $id
            ])
        );

        return new RoundItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): RoundCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/rounds/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new RoundCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): RoundCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/rounds/search/{query}', [
                'query' => $query
            ])
        );

        return new RoundCollection($data);
    }
}