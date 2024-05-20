<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class FixtureResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/fixtures'
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): FixtureItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/{id}', [
                'id' => $id
            ])
        );

        return new FixtureItem($data);
    }

    /**
     * @param int[] $ids
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getAllByMultipleIds(array $ids): FixtureCollection
    {
        $this->validateMultipleIntegers($ids, 'ids');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/multi/{ids}', [
                'ids' => \implode(',', $ids)
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByDate(\DateTimeInterface $date): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/date/{date}', [
                'date' => $date->format('Y-m-d')
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getAllByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): FixtureCollection
    {
        $this->validateDateOrder($startDate, $endDate);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/between/{startDate}/{endDate}', [
                'startDate' => $startDate->format('Y-m-d'),
                'endDate' => $endDate->format('Y-m-d')
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getAllByTeamIdAndDateRange(
        int $teamId,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate
    ): FixtureCollection
    {
        $this->validateDateOrder($startDate, $endDate);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/between/{startDate}/{endDate}/{teamId}', [
                'startDate' => $startDate->format('Y-m-d'),
                'endDate' => $endDate->format('Y-m-d'),
                'teamId' => $teamId
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByHeadToHead(int $teamId1, int $teamId2): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/head-to-head/{teamId1}/{teamId2}', [
                'teamId1' => $teamId1,
                'teamId2' => $teamId2
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): FixtureCollection
    {
        $this->validateQuery($query, 'query');

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/search/{query}', [
                'query' => $query
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllUpcomingByMarketId(int $marketId): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/upcoming/markets/{marketId}', [
                'marketId' => $marketId
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllUpcomingByTvStationId(int $tvStationId): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/upcoming/tv-stations/{tvStationId}', [
                'tvStationId' => $tvStationId
            ])
        );

        return new FixtureCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllPastByTvStationId(int $tvStationId): FixtureCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/fixtures/past/tv-stations/{tvStationId}', [
                'tvStationId' => $tvStationId
            ])
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
            path: '/v3/football/fixtures/latest'
        );

        return new FixtureCollection($data);
    }
}