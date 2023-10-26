<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Region;

class RegionItem extends AbstractResponse
{
    private Region $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Region($response['data'], $response['timezone']);
    }

    public function getData(): Region
    {
        return $this->data;
    }
}