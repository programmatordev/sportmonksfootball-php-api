<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;

class CoachItem extends AbstractResponse
{
    private Coach $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Coach($data['data'], $data['timezone']);
    }

    public function getData(): Coach
    {
        return $this->data;
    }
}