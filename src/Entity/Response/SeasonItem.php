<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Season;

class SeasonItem extends AbstractResponse
{
    private Season $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Season($response['data'], $response['timezone']);
    }

    public function getData(): Season
    {
        return $this->data;
    }
}