<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentItem;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class ContinentEndpoint extends AbstractEndpoint
{
    use CreateEntityCollectionTrait;

    protected int $cacheTtl = 60 * 60; // 1 hour

    /**
     * @throws Exception
     */
    public function getAll(): ContinentCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/continents'
        );

        return new ContinentCollection($response);
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): ContinentItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->buildPath('/v3/core/continents/{id}', [
                'id' => $id
            ])
        );

        return new ContinentItem($response);
    }
}