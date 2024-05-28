<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StateCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StateItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class StateResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): StateCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/football/states'
        );

        return new StateCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): StateItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/football/states/{id}', [
                'id' => $id
            ])
        );

        return new StateItem($data);
    }
}