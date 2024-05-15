<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\City;

class CityItem extends AbstractResponse
{
    private City $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new City($data['data'], $data['timezone']);
    }

    public function getData(): City
    {
        return $this->data;
    }
}