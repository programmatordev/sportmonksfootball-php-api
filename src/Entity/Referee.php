<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Referee extends Person
{
    use EntityTrait;

    private ?City $city;

    /** @var ?RefereeStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        // include
        $this->city = isset($data['city']) ? new City($data['city'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(RefereeStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}