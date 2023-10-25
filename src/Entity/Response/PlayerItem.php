<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Player;

class PlayerItem extends AbstractResponse
{
    private Player $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Player($response['data'], $response['timezone']);
    }

    public function getData(): Player
    {
        return $this->data;
    }
}