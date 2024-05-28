<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\OddCollection;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class PreMatchOddResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): OddCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/odds/pre-match'
        );

        return new OddCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureId(int $fixtureId): OddCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/odds/pre-match/fixtures/{fixtureId}', [
                'fixtureId' => $fixtureId
            ])
        );

        return new OddCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureIdAndBookmakerId(int $fixtureId, int $bookmakerId): OddCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/odds/pre-match/fixtures/{fixtureId}/bookmakers/{bookmakerId}', [
                'fixtureId' => $fixtureId,
                'bookmakerId' => $bookmakerId
            ])
        );

        return new OddCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByFixtureIdAndMarketId(int $fixtureId, int $marketId): OddCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/odds/pre-match/fixtures/{fixtureId}/markets/{marketId}', [
                'fixtureId' => $fixtureId,
                'marketId' => $marketId
            ])
        );

        return new OddCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLastUpdated(): OddCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/odds/pre-match/latest'
        );

        return new OddCollection($data);
    }
}