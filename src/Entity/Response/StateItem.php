<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;

class StateItem extends AbstractResponse
{
    private State $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new State($data['data']);
    }

    public function getData(): State
    {
        return $this->data;
    }
}