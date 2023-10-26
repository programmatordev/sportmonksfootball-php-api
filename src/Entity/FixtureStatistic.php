<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FixtureStatistic
{
    private int $id;

    private int $fixtureId;

    private int $typeId;

    private ?int $fixtureStatisticId;

    private ?int $participantId;

    private ?int $periodId;

    private ?array $data;

    private ?string $location;

    private ?Fixture $fixture;

    private ?Type $type;

    private ?Period $period;

    private ?Team $participant;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->typeId = $data['type_id'];

        // select
        $this->fixtureStatisticId = $data['fixture_statistics_id'] ?? null;
        $this->participantId = $data['participant_id'] ?? null;
        $this->periodId = $data['period_id'] ?? null;
        $this->data = $data['data'] ?? null;
        $this->location = $data['location'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->period = isset($data['period']) ? new Period($data['period'], $timezone) : null;
        $this->participant = isset($data['participant']) ? new Team($data['participant'], $timezone) : null;
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

    public function getFixtureStatisticId(): ?int
    {
        return $this->fixtureStatisticId;
    }

    public function getParticipantId(): ?int
    {
        return $this->participantId;
    }

    public function getPeriodId(): ?int
    {
        return $this->periodId;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }
}