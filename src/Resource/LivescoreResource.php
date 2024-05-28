<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use Psr\Http\Client\ClientExceptionInterface;

class LivescoreResource extends Resource
{
    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/livescores'
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllInplay(): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/livescores/inplay'
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLastUpdated(): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/livescores/latest'
        );

        return new FixtureCollection($data);
    }
}