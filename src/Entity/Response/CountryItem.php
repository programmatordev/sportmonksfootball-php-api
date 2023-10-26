<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Country;

class CountryItem extends AbstractResponse
{
    private Country $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Country($response['data'], $response['timezone']);
    }

    public function getData(): Country
    {
        return $this->data;
    }
}