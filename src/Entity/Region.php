<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class Region
{
    use EntityCollectionTrait;

    private int $id;

    private int $countryId;

    private ?string $name;

    private ?Country $country;

    /** @var ?City[] */
    private ?array $cities;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->countryId = $data['country_id'];

        // select
        $this->name = $data['name'] ?? null;

        // include
        $this->country = isset($data['country']) ? new Country($data['country'], $timezone) : null;
        $this->cities = isset($data['cities']) ? $this->createEntityCollection(City::class, $data['cities'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function getCities(): ?array
    {
        return $this->cities;
    }
}