<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;

class CoachItem extends AbstractResponse
{
    private Coach $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Coach($response['data']);
    }

    public function getData(): Coach
    {
        return $this->data;
    }
}