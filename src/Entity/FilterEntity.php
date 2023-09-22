<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FilterEntity
{
    private string $name;

    private array $filters;

    public function __construct(array $data, string $name)
    {
        $this->name = $name;
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