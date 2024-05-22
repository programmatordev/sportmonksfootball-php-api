<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class CountryResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): CountryCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/countries'
        );

        return new CountryCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): CountryItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/countries/{id}', [
                'id' => $id
            ])
        );

        return new CountryItem($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): CountryCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/countries/search/{query}', [
                'query' => $query
            ])
        );

        return new CountryCollection($data);
    }
}