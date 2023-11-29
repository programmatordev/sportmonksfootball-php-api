<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class Continent
{
    use EntityCollectionTrait;

    private int $id;

    private ?string $name;

    private ?string $code;

    /** @var ?Country[] */
    private ?array $countries;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->code = $data['code'] ?? null;

        // include
        $this->countries = isset($data['countries']) ? $this->createEntityCollection(Country::class, $data['countries'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getCountries(): ?array
    {
        return $this->countries;
    }

}