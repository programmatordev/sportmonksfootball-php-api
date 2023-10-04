<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;

class TvStationItem extends AbstractResponse
{
    private TvStation $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new TvStation($response['data']);
    }

    public function getData(): TvStation
    {
        return $this->data;
    }
}