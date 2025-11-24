<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class Referee extends Person
{
    private ?City $city;

    /** @var ?RefereeStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        // include
        $this->city = isset($data['city']) ? new City($data['city'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? EntityHelper::createEntityCollection(RefereeStatistic::class, $data['statistics'], $timezone) : null;
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