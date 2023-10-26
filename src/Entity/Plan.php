<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Plan
{
    private string $name;

    private string $sport;

    private string $category;

    public function __construct(array $data)
    {
        $this->name = $data['plan'];
        $this->sport = $data['sport'];
        $this->category = $data['category'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSport(): string
    {
        return $this->sport;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}