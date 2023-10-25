<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Round;

class RoundItem extends AbstractResponse
{
    private Round $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Round($response['data'], $response['timezone']);
    }

    public function getData(): Round
    {
        return $this->data;
    }
}