<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Team;

class TeamItem extends AbstractResponse
{
    private Team $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Team($data['data'], $data['timezone']);
    }

    public function getData(): Team
    {
        return $this->data;
    }
}