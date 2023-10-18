<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Wind
{
    private float $speed;

    private int $direction;

    public function __construct(array $data)
    {
        $this->speed = $data['speed'];
        $this->direction = $data['direction'];
    }

    public function getSpeed(): float
    {
        return $this->speed;
    }

    public function getDirection(): int
    {
        return $this->direction;
    }
}