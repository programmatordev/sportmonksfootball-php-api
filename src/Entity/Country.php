<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Country
{
    use CreateEntityCollectionTrait;

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

    /** @var ?Region[] */
    private ?array $regions;

    /** @var ?League[] */
    private ?array $leagues;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->continentId = $data['continent_id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->officialName = $data['official_name'] ?? null;
        $this->fifaName = $data['fifa_name'] ?? null;
        $this->iso2 = $data['iso2'] ?? null;
        $this->iso3 = $data['iso3'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;
        $this->borders = $data['borders'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;

        // include
        $this->continent = isset($data['continent']) ? new Continent($data['continent'], $timezone) : null;
        $this->regions = isset($data['regions']) ? $this->createEntityCollection(Region::class, $data['regions'], $timezone) : null;
        $this->leagues = isset($data['leagues']) ? $this->createEntityCollection(League::class, $data['leagues'], $timezone) : null;
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

    public function getRegions(): ?array
    {
        return $this->regions;
    }

    public function getLeagues(): ?array
    {
        return $this->leagues;
    }
}