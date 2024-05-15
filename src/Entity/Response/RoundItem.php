<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Round;

class RoundItem extends AbstractResponse
{
    private Round $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Round($data['data'], $data['timezone']);
    }

    public function getData(): Round
    {
        return $this->data;
    }
}