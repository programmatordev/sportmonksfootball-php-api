<?php

namespace ProgrammatorDev\SportMonksFootball\Resource;

use ProgrammatorDev\SportMonksFootball\Entity\Response\FilterEntityCollection;
use Psr\Http\Client\ClientExceptionInterface;

class FilterResource extends Resource
{
    /**
     * @throws ClientExceptionInterface
     */
    public function getAllByEntity(): FilterEntityCollection
    {
        $data = $this->api->request(
            method: 'GET',
            path: '/v3/my/filters/entity'
        );

        return new FilterEntityCollection($data);
    }
}