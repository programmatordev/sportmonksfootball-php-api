<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class PlayerResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): PlayerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/players'
        );

        return new PlayerCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): PlayerItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/players/{id}', [
                'id' => $id
            ])
        );

        return new PlayerItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCountryId(int $countryId): PlayerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/players/countries/{countryId}', [
                'countryId' => $countryId
            ])
        );

        return new PlayerCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): PlayerCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/players/search/{query}', [
                'query' => $query
            ])
        );

        return new PlayerCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLastUpdated(): PlayerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/players/latest'
        );

        return new PlayerCollection($data);
    }
}