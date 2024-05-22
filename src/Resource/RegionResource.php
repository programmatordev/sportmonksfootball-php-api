<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RegionCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RegionItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class RegionResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): RegionCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/regions'
        );

        return new RegionCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): RegionItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/regions/{id}', [
                'id' => $id
            ])
        );

        return new RegionItem($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): RegionCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/regions/search/{query}', [
                'query' => $query
            ])
        );

        return new RegionCollection($data);
    }
}