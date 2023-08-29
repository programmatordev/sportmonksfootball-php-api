<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentItem;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class ContinentEndpoint extends AbstractEndpoint
{
    use CreateEntityCollectionTrait;

    private string $urlGetAllContinents = 'https://api.sportmonks.com/v3/core/continents';

    private string $urlGetContinentById = 'https://api.sportmonks.com/v3/core/continents/{id}';

    protected int $cacheTtl = 60 * 60; // 1 hour

    /**
     * @throws Exception
     */
    public function getAllContinents(): ContinentCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            baseUrl: $this->urlGetAllContinents
        );

        return new ContinentCollection($response, Continent::class);
    }

    /**
     * @throws Exception
     */
    public function getContinentById(int $id): ContinentItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            baseUrl: $this->formatUrlTemplate($this->urlGetContinentById, [
                'id' => $id
            ])
        );

        return new ContinentItem($response, Continent::class);
    }
}