<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class League
{
    use EntityTrait;

    private int $id;

    private int $sportId;

    private int $countryId;

    private ?string $name;

    private ?bool $isActive;

    private ?string $shortCode;

    private ?string $imagePath;

    private ?string $type;

    private ?string $subType;

    private ?\DateTimeImmutable $lastPlayedAt;

    private ?int $category;

    private ?bool $hasJerseys;

    private ?Sport $sport;

    private ?Country $country;

    /** @var ?Stage[] */
    private ?array $stages;

    /** @var ?Fixture[] */
    private ?array $latestFixtures;

    /** @var ?Fixture[] */
    private ?array $upcomingFixtures;

    /** @var ?Fixture[] */
    private ?array $inplayFixtures;

    /** @var ?Fixture[] */
    private ?array $todayFixtures;

    private ?Season $currentSeason;

    /** @var ?Season[] */
    private ?array $seasons;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->countryId = $data['country_id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->isActive = $data['active'] ?? null;
        $this->shortCode = $data['short_code'] ?? null;
        $this->imagePath = $data['image_path'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->subType = $data['sub_type'] ?? null;
        $this->lastPlayedAt = isset($data['last_played_at']) ? new \DateTimeImmutable($data['last_played_at']) : null;
        $this->category = $data['category'] ?? null;
        $this->hasJerseys = $data['has_jerseys'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->country = isset($data['country']) ? new Country($data['country'], $timezone) : null;
        $this->stages = isset($data['stages']) ? $this->createEntityCollection(Stage::class, $data['stages'], $timezone) : null;
        $this->latestFixtures = isset($data['latest']) ? $this->createEntityCollection(Fixture::class, $data['latest'], $timezone) : null;
        $this->upcomingFixtures = isset($data['upcoming']) ? $this->createEntityCollection(Fixture::class, $data['upcoming'], $timezone) : null;
        $this->inplayFixtures = isset($data['inplay']) ? $this->createEntityCollection(Fixture::class, $data['inplay'], $timezone) : null;
        $this->todayFixtures = isset($data['today']) ? $this->createEntityCollection(Fixture::class, $data['today'], $timezone) : null;
        $this->currentSeason = isset($data['currentseason']) ? new Season($data['currentseason'], $timezone) : null;
        $this->seasons = isset($data['seasons']) ? $this->createEntityCollection(Season::class, $data['seasons'], $timezone) : null;
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

    public function isActive(): ?bool
    {
        return $this->isActive;
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

    public function getStages(): ?array
    {
        return $this->stages;
    }

    public function getLatestFixtures(): ?array
    {
        return $this->latestFixtures;
    }

    public function getUpcomingFixtures(): ?array
    {
        return $this->upcomingFixtures;
    }

    public function getInplayFixtures(): ?array
    {
        return $this->inplayFixtures;
    }

    public function getTodayFixtures(): ?array
    {
        return $this->todayFixtures;
    }
}