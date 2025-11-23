<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\MarketCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\MarketItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class MarketResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): MarketCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/odds/markets'
        );

        return new MarketCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): MarketItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/odds/markets/{id}', [
                'id' => $id
            ])
        );

        return new MarketItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllBySearchQuery(string $query): MarketCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/odds/markets/search/{query}', [
                'query' => $query
            ])
        );

        return new MarketCollection($data);
    }
}