<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Referee;

class RefereeItem extends AbstractResponse
{
    private Referee $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Referee($data['data'], $data['timezone']);
    }

    public function getData(): Referee
    {
        return $this->data;
    }
}