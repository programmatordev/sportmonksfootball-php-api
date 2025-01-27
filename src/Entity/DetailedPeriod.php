<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class DetailedPeriod
{
    use EntityTrait;

    private int $id;

    private int $fixtureId;

    private int $typeId;

    private ?\DateTimeImmutable $startAt;

    private ?\DateTimeImmutable $endAt;

    private ?int $countsFrom;

    private ?bool $isTicking;

    private ?int $sortOrder;

    private ?string $description;

    private ?int $timeAdded;

    private ?int $periodLength;

    private ?int $minutes;

    private ?int $seconds;

    private bool $hasTimer;

    private ?Fixture $fixture;

    private ?Type $type;

    /** @var ?Event[] */
    private ?array $events;

    /** @var ?Event[] */
    private ?array $timeline;

    /** @var ?FixtureStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->typeId = $data['type_id'];
        $this->hasTimer = $data['has_timer'];

        // select
        $this->startAt = isset($data['started']) ? \DateTimeImmutable::createFromFormat('U', $data['started']) : null;
        $this->endAt = isset($data['ended']) ? \DateTimeImmutable::createFromFormat('U', $data['ended']) : null;
        $this->countsFrom = $data['counts_from'] ?? null;
        $this->isTicking = $data['ticking'] ?? null;
        $this->sortOrder = $data['sort_order'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->timeAdded = $data['time_added'] ?? null;
        $this->periodLength = $data['period_length'] ?? null;
        $this->minutes = $data['minutes'] ?? null;
        $this->seconds = $data['seconds'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->events = isset($data['events']) ? $this->createEntityCollection(Event::class, $data['events'], $timezone) : null;
        $this->timeline = isset($data['timeline']) ? $this->createEntityCollection(Event::class, $data['timeline'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(FixtureStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function getCountsFrom(): ?int
    {
        return $this->countsFrom;
    }

    public function isTicking(): ?bool
    {
        return $this->isTicking;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getTimeAdded(): ?int
    {
        return $this->timeAdded;
    }

    public function getPeriodLength(): ?int
    {
        return $this->periodLength;
    }

    public function getMinutes(): ?int
    {
        return $this->minutes;
    }

    public function getSeconds(): ?int
    {
        return $this->seconds;
    }

    public function hasTimer(): bool
    {
        return $this->hasTimer;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getEvents(): ?array
    {
        return $this->events;
    }

    public function getTimeline(): ?array
    {
        return $this->timeline;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}