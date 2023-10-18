<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Temperature
{
    private float $morning;

    private float $day;

    private float $evening;

    private float $night;

    public function __construct(array $data)
    {
        $this->morning = $data['morning'];
        $this->day = $data['day'];
        $this->evening = $data['evening'];
        $this->night = $data['night'];
    }

    public function getMorning(): float
    {
        return $this->morning;
    }

    public function getDay(): float
    {
        return $this->day;
    }

    public function getEvening(): float
    {
        return $this->evening;
    }

    public function getNight(): float
    {
        return $this->night;
    }
}