<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TransferCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TransferItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class TransferResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): TransferCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/transfers'
        );

        return new TransferCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): TransferItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/transfers/{id}', [
                'id' => $id
            ])
        );

        return new TransferItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllLatest(): TransferCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/transfers/latest'
        );

        return new TransferCollection($data);
    }

    /**
     * @throws ValidationException
     * @throws ClientExceptionInterface
     */
    public function getAllByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): TransferCollection
    {
        $this->validateDateOrder($startDate, $endDate);

        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/transfers/between/{startDate}/{endDate}', [
                'startDate' => $startDate->format('Y-m-d'),
                'endDate' => $endDate->format('Y-m-d')
            ])
        );

        return new TransferCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByTeamId(int $teamId): TransferCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/transfers/teams/{teamId}', [
                'teamId' => $teamId
            ])
        );

        return new TransferCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByPlayerId(int $playerId): TransferCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/transfers/players/{playerId}', [
                'playerId' => $playerId
            ])
        );

        return new TransferCollection($data);
    }
}