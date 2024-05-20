<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class CoachResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): CoachCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/coaches'
        );

        return new CoachCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): CoachItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/coaches/{id}', [
                'id' => $id
            ])
        );

        return new CoachItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCountryId(int $countryId): CoachCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/coaches/countries/{countryId}', [
                'countryId' => $countryId
            ])
        );

        return new CoachCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): CoachCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/coaches/search/{query}', [
                'query' => $query
            ])
        );

        return new CoachCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLastUpdated(): CoachCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/coaches/latest'
        );

        return new CoachCollection($data);
    }
}