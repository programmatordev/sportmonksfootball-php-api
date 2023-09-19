<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\City;

class CityItem extends AbstractResponse
{
    private City $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new City($response['data']);
    }

    public function getData(): City
    {
        return $this->data;
    }
}