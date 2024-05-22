<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeEntityCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeItem;
use ProgrammatorDev\SportMonksFootball\Resource\Util\PaginationTrait;
use Psr\Http\Client\ClientExceptionInterface;

class TypeResource extends Resource
{
    use PaginationTrait;

    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): TypeCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/types'
        );

        return new TypeCollection($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getById(int $id): TypeItem
    {
        $data = $this->api->request(
            method: 'GET',
            path: $this->api->buildPath('/v3/core/types/{id}', [
                'id' => $id
            ])
        );

        return new TypeItem($data);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByEntity(): TypeEntityCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/types/entities'
        );

        return new TypeEntityCollection($data);
    }
}