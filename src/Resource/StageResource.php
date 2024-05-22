<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StageCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StageItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class StageResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): StageCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/stages'
        );

        return new StageCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): StageItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/stages/{id}', [
                'id' => $id
            ])
        );

        return new StageItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): StageCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/stages/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new StageCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): StageCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/stages/search/{query}', [
                'query' => $query
            ])
        );

        return new StageCollection($data);
    }
}