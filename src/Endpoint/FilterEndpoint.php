<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FilterEntityCollection;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;

class FilterEndpoint extends AbstractEndpoint
{
    protected int $cacheTtl = 3600 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByEntity(): FilterEntityCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/my/filters/entity'
        );

        return new FilterEntityCollection($response);
    }
}