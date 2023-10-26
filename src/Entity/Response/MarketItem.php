<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Market;

class MarketItem extends AbstractResponse
{
    private Market $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Market($response['data']);
    }

    public function getData(): Market
    {
        return $this->data;
    }
}