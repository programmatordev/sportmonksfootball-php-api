<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FilterEntity
{
    private string $name;

    private array $filters;

    public function __construct(array $data)
    {
        // "_key" index is injected in data to get the key from an associative array response
        // Check the CreateEntityCollectionTrait
        $this->name = $data['_key'];

        // Remove injected "_key" to not pollute filters data
        unset($data['_key']);
        $this->filters = $data;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }
}