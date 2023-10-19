<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Score
{
    private int $id;

    private int $fixtureId;

    private int $typeId;

    private int $participantId;

    private ?int $goals;

    private ?string $location;

    private ?string $description;

    private ?Fixture $fixture;

    private ?Team $participant;

    private ?Type $type;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->typeId = $data['type_id'];
        $this->participantId = $data['participant_id'];

        // select
        $this->goals = $data['score']['goals'] ?? null;
        $this->location = $data['score']['participant'] ?? null;
        $this->description = $data['description'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
        $this->participant = isset($data['participant']) ? new Team($data['participant']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
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

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getGoals(): ?int
    {
        return $this->goals;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}