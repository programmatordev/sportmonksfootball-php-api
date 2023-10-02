<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Venue
{
    use CreateEntityCollectionTrait;

    private int $id;

    private ?int $countryId;

    private ?int $cityId;

    private ?string $name;

    private ?string $address;

    private ?string $zipCode;

    private ?float $latitude;

    private ?float $longitude;

    private ?int $capacity;

    private ?string $imagePath;

    private ?string $cityName;

    private ?string $surface;

    private ?bool $isNationalTeam;

    private ?Country $country;

    private ?City $city;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->countryId = $data['country_id'] ?? null;
        $this->cityId = $data['city_id'] ?? null;

        // select
        $this->name = $data['name'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->zipCode = $data['zip_code'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;
        $this->capacity = $data['capacity'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->cityName = $data['city_name'] ?? null;
        $this->surface = $data['surface'] ?? null;
        $this->isNationalTeam = $data['national_team'] ?? null;

        // include
        $this->country = isset($data['country']) ? new Country($data['country']) : null;
        $this->city = isset($data['city']) ? new City($data['city']) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function isNationalTeam(): ?bool
    {
        return $this->isNationalTeam;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }
}