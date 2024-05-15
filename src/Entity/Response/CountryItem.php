<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Country;

class CountryItem extends AbstractResponse
{
    private Country $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Country($data['data'], $data['timezone']);
    }

    public function getData(): Country
    {
        return $this->data;
    }
}