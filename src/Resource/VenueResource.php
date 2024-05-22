<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class VenueResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): VenueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/venues'
        );

        return new VenueCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): VenueItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/venues/{id}', [
                'id' => $id
            ])
        );

        return new VenueItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): VenueCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/venues/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new VenueCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): VenueCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/venues/search/{query}', [
                'query' => $query
            ])
        );

        return new VenueCollection($data);
    }
}