<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Continent
{
    use CreateEntityCollectionTrait;

    private int $id;

    private string $name;

    private string $code;

    private ?array $countries;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->code = $data['code'];

        // Includes
        $this->countries = isset($data['countries'])
            ? $this->createEntityCollection(Country::class, $data['countries'])
            : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return ?Country[]
     */
    public function getCountries(): ?array
    {
        return $this->countries;
    }

}