<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Team;

class TeamItem extends AbstractResponse
{
    private Team $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Team($response['data']);
    }

    public function getData(): Team
    {
        return $this->data;
    }
}