<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class WeatherReport
{
    private int $id;

    private int $fixtureId;

    private int $venueId;

    private ?Temperature $temperature;

    private ?Temperature $feelsLike;

    private ?Wind $wind;

    private ?string $humidity;

    private ?int $pressure;

    private ?string $clouds;

    private ?string $description;

    private ?string $icon;

    private ?string $type;

    private ?string $metric;

    private ?bool $isCurrent;

    private ?Venue $venue;

    private ?Fixture $fixture;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->venueId = $data['venue_id'];

        // select
        $this->temperature = isset($data['temperature']) ? new Temperature($data['temperature']) : null;
        $this->feelsLike = isset($data['feels_like']) ? new Temperature($data['feels_like']) : null;
        $this->wind = isset($data['wind']) ? new Wind($data['wind']) : null;
        $this->humidity = $data['humidity'] ?? null;
        $this->pressure = $data['pressure'] ?? null;
        $this->clouds = $data['clouds'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->icon = $data['icon'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->metric = $data['metric'] ?? null;
        $this->isCurrent = $data['current'] ?? null;

        // include
        $this->venue = isset($data['venue']) ? new Venue($data['venue'], $timezone) : null;
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getVenueId(): int
    {
        return $this->venueId;
    }

    public function getTemperature(): ?Temperature
    {
        return $this->temperature;
    }

    public function getFeelsLike(): ?Temperature
    {
        return $this->feelsLike;
    }

    public function getWind(): ?Wind
    {
        return $this->wind;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function getPressure(): ?int
    {
        return $this->pressure;
    }

    public function getClouds(): ?string
    {
        return $this->clouds;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getMetric(): ?string
    {
        return $this->metric;
    }

    public function isCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }
}