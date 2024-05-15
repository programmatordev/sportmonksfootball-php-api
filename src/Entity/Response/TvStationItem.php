<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;

class TvStationItem extends AbstractResponse
{
    private TvStation $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new TvStation($data['data'], $data['timezone']);
    }

    public function getData(): TvStation
    {
        return $this->data;
    }
}