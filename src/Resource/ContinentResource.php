<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class ContinentResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): ContinentCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/continents'
        );

        return new ContinentCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): ContinentItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/continents/{id}', [
                'id' => $id
            ])
        );

        return new ContinentItem($data);
    }
}