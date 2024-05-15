<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Region;

class RegionItem extends AbstractResponse
{
    private Region $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Region($data['data'], $data['timezone']);
    }

    public function getData(): Region
    {
        return $this->data;
    }
}