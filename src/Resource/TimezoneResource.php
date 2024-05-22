<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TimezoneCollection;
use Psr\Http\Client\ClientExceptionInterface;

class TimezoneResource extends Resource
{
    /**
     * @throws ClientExceptionInterface
     */
    public function getAll(): TimezoneCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/core/timezones'
        );

        return new TimezoneCollection($data);
    }
}