<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;

class ContinentItem extends AbstractResponse
{
    private Continent $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Continent($response['data'], $response['timezone']);
    }

    public function getData(): Continent
    {
        return $this->data;
    }
}