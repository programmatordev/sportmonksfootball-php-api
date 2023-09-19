<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Region
{
    private int $id;

    private int $countryId;

    private ?string $name;

    private ?Country $country;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->countryId = $data['country_id'];

        // Select
        $this->name = $data['name'] ?? null;

        // Include
        $this->country = isset($data['country'])
            ? new Country($data['country'])
            : null;
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
}