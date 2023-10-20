<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;

class LivescoreEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAll(): FixtureCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/livescores'
        );

        return new FixtureCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllInplay(): FixtureCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/livescores/inplay'
        );

        return new FixtureCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllLastUpdated(): FixtureCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/football/livescores/latest'
        );

        return new FixtureCollection($response);
    }
}