<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class SocialChannel
{
    private int $id;

    private ?string $name;

    private ?string $baseUrl;

    private ?string $hexColor;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->baseUrl = $data['base_url'] ?? null;
        $this->hexColor = $data['hex_color'] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    public function getHexColor(): ?string
    {
        return $this->hexColor;
    }
}