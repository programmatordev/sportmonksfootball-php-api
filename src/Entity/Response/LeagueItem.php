<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\League;

class LeagueItem extends AbstractResponse
{
    private League $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new League($response['data']);
    }

    public function getData(): League
    {
        return $this->data;
    }
}