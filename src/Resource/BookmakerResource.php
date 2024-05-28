<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class BookmakerResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): BookmakerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/odds/bookmakers'
        );
        return new BookmakerCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): BookmakerItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/odds/bookmakers/{id}', [
                'id' => $id
            ])
        );

        return new BookmakerItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureId(int $fixtureId): BookmakerCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/odds/bookmakers/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new BookmakerCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): BookmakerCollection
    {
        $this->validateQuery($query);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/odds/bookmakers/search/{query}', [
                'query' => $query
            ])
        );

        return new BookmakerCollection($data);
    }
}