<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\League;

class LeagueItem extends AbstractResponse
{
    private League $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new League($data['data'], $data['timezone']);
    }

    public function getData(): League
    {
        return $this->data;
    }
}