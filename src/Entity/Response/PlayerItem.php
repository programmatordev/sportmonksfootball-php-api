<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Player;

class PlayerItem extends AbstractResponse
{
    private Player $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Player($data['data'], $data['timezone']);
    }

    public function getData(): Player
    {
        return $this->data;
    }
}