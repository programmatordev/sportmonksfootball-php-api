<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;

class ContinentItem extends AbstractResponse
{
    private Continent $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Continent($data['data'], $data['timezone']);
    }

    public function getData(): Continent
    {
        return $this->data;
    }
}