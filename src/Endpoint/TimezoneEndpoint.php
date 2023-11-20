<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TimezoneCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;

class TimezoneEndpoint extends AbstractEndpoint
{
    protected int $cacheTtl = 3600 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAll(): TimezoneCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/timezones'
        );

        return new TimezoneCollection($response);
    }
}