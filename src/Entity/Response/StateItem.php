<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;

class StateItem extends AbstractResponse
{
    private State $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new State($response['data']);
    }

    public function getData(): State
    {
        return $this->data;
    }
}