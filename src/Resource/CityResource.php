<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CityCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CityItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class CityResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): CityCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/cities'
        );

        return new CityCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): CityItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/cities/{id}', [
                'id' => $id
            ])
        );

        return new CityItem($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): CityCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/cities/search/{query}', [
                'query' => $query
            ])
        );

        return new CityCollection($data);
    }
}