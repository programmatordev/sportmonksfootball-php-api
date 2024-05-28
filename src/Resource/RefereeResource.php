<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class RefereeResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): RefereeCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/referees'
        );

        return new RefereeCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): RefereeItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/referees/{id}', [
                'id' => $id
            ])
        );

        return new RefereeItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByCountryId(int $countryId): RefereeCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/referees/countries/{countryId}', [
                'countryId' => $countryId
            ])
        );

        return new RefereeCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySeasonId(int $seasonId): RefereeCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/referees/seasons/{seasonId}', [
                'seasonId' => $seasonId
            ])
        );

        return new RefereeCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): RefereeCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/referees/search/{query}', [
                'query' => $query
            ])
        );

        return new RefereeCollection($data);
    }
}