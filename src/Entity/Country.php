<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Country
{
    private int $id;

    private int $continentId;

    private ?string $name;

    private ?string $officialName;

    private ?string $fifaName;

    private ?string $iso2;

    private ?string $iso3;

    private ?float $latitude;

    private ?float $longitude;

    private ?array $borders;

    private ?string $imagePath;

    private ?Continent $continent;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->continentId = $data['continent_id'];

        // Select
        $this->name = $data['name'] ?? null;
        $this->officialName = $data['official_name'] ?? null;
        $this->fifaName = $data['fifa_name'] ?? null;
        $this->iso2 = $data['iso2'] ?? null;
        $this->iso3 = $data['iso3'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;
        $this->borders = $data['borders'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;

        // Include
        $this->continent = isset($data['continent'])
            ? new Continent($data['continent'])
            : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContinentId(): int
    {
        return $this->continentId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getOfficialName(): ?string
    {
        return $this->officialName;
    }

    public function getFifaName(): ?string
    {
        return $this->fifaName;
    }

    public function getIso2(): ?string
    {
        return $this->iso2;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function getBorders(): ?array
    {
        return $this->borders;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }
}