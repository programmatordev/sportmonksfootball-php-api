<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Market;

class MarketItem extends AbstractResponse
{
    private Market $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Market($data['data']);
    }

    public function getData(): Market
    {
        return $this->data;
    }
}