<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Referee;

class RefereeItem extends AbstractResponse
{
    private Referee $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Referee($response['data'], $response['timezone']);
    }

    public function getData(): Referee
    {
        return $this->data;
    }
}