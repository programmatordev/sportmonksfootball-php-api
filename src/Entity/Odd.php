<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Odd
{
    private int $id;

    private int $fixtureId;

    private int $marketId;

    private int $bookmakerId;

    private ?string $label;

    private ?string $value;

    private ?string $name;

    private ?int $sortOrder;

    private ?string $marketDescription;

    private ?string $probability;

    private ?string $dp3;

    private ?string $fractional;

    private ?string $american;

    private ?bool $isWinning;

    private ?bool $hasStopped;

    private ?string $total;

    private ?string $handicap;

    private ?string $participants;

    private ?\DateTimeImmutable $createdAt;

    private ?\DateTimeImmutable $updatedAt;

    private ?string $originalLabel;

    private ?\DateTimeImmutable $latestBookmakerUpdatedAt;

    private ?Fixture $fixture;

    private ?Market $market;

    private ?Bookmaker $bookmaker;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->marketId = $data['market_id'];
        $this->bookmakerId = $data['bookmaker_id'];

        // select
        $this->label = $data['label'] ?? null;
        $this->value = $data['value'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->sortOrder = $data['sort_order'] ?? null;
        $this->marketDescription = $data['market_description'] ?? null;
        $this->probability = $data['probability'] ?? null;
        $this->dp3 = $data['dp3'] ?? null;
        $this->fractional = $data['fractional'] ?? null;
        $this->american = $data['american'] ?? null;
        $this->isWinning = $data['winning'] ?? null;
        $this->hasStopped = $data['stopped'] ?? null;
        $this->total = $data['total'] ?? null;
        $this->handicap = $data['handicap'] ?? null;
        $this->participants = $data['participants'] ?? null;
        $this->createdAt = isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null;
        $this->updatedAt = isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null;
        $this->originalLabel = $data['original_label'] ?? null;
        $this->latestBookmakerUpdatedAt = isset($data['latest_bookmaker_update']) ? new \DateTimeImmutable($data['latest_bookmaker_update']) : null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->market = isset($data['market']) ? new Market($data['market']) : null;
        $this->bookmaker = isset($data['bookmaker']) ? new Bookmaker($data['bookmaker']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getMarketId(): int
    {
        return $this->marketId;
    }

    public function getBookmakerId(): int
    {
        return $this->bookmakerId;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function getMarketDescription(): ?string
    {
        return $this->marketDescription;
    }

    public function getProbability(): ?string
    {
        return $this->probability;
    }

    public function getDp3(): ?string
    {
        return $this->dp3;
    }

    public function getFractional(): ?string
    {
        return $this->fractional;
    }

    public function getAmerican(): ?string
    {
        return $this->american;
    }

    public function isWinning(): ?bool
    {
        return $this->isWinning;
    }

    public function hasStopped(): ?bool
    {
        return $this->hasStopped;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function getHandicap(): ?string
    {
        return $this->handicap;
    }

    public function getParticipants(): ?string
    {
        return $this->participants;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getOriginalLabel(): ?string
    {
        return $this->originalLabel;
    }

    public function getLatestBookmakerUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->latestBookmakerUpdatedAt;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getMarket(): ?Market
    {
        return $this->market;
    }

    public function getBookmaker(): ?Bookmaker
    {
        return $this->bookmaker;
    }
}