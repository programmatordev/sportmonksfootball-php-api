<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Season;

class SeasonItem extends AbstractResponse
{
    private Season $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Season($data['data'], $data['timezone']);
    }

    public function getData(): Season
    {
        return $this->data;
    }
}