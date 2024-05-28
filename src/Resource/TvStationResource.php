<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TvStationCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TvStationItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class TvStationResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): TvStationCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/tv-stations'
        );

        return new TvStationCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): TvStationItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/tv-stations/{id}', [
                'id' => $id
            ])
        );

        return new TvStationItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureId(int $fixtureId): TvStationCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/tv-stations/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new TvStationCollection($data);
    }
}