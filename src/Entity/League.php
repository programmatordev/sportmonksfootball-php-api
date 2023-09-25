<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class League
{
    private int $id;

    private int $sportId;

    private int $countryId;

    private ?string $name;

    private ?bool $active;

    private ?string $shortCode;

    private ?string $imagePath;

    private ?string $type;

    private ?string $subType;

    private ?\DateTimeImmutable $lastPlayedAt;

    private ?int $category;

    private ?bool $hasJerseys;

    private ?Sport $sport;

    private ?Country $country;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'];

        // Select
        $this->name = $data['name'] ?? null;
        $this->active = $data['active'] ?? null;
        $this->shortCode = $data['short_code'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->subType = $data['sub_type'] ?? null;
        $this->lastPlayedAt = isset($data['last_played_at']) ? new \DateTimeImmutable($data['last_played_at']) : null;
        $this->category = $data['category'] ?? null;
        $this->hasJerseys = $data['has_jerseys'] ?? null;

        // Include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country']) : null;

        // sport, country, stages, latest, upcoming, inplay, today, currentSeason, seasons
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function getShortCode(): ?string
    {
        return $this->shortCode;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getSubType(): ?string
    {
        return $this->subType;
    }

    public function getLastPlayedAt(): ?\DateTimeImmutable
    {
        return $this->lastPlayedAt;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function hasJerseys(): ?bool
    {
        return $this->hasJerseys;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }
}