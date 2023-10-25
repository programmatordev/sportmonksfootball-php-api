<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class City
{
    private int $id;

    private int $regionId;

    private ?int $countryId;

    private ?string $name;

    private ?float $latitude;

    private ?float $longitude;

    private ?Region $region;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->regionId = $data['region_id'];

        // select
        $this->countryId = $data['country_id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;

        // include
        $this->region = isset($data['region']) ? new Region($data['region'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRegionId(): int
    {
        return $this->regionId;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }
}