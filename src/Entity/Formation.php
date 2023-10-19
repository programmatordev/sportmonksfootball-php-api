<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Formation
{
    private int $id;

    private int $fixtureId;

    private int $participantId;

    private ?string $formation;

    private ?string $location;

    private ?Fixture $fixture;

    private ?Team $participant;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->participantId = $data['participant_id'];

        // select
        $this->formation = $data['formation'] ?? null;
        $this->location = $data['location'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
        $this->participant = isset($data['participant']) ? new Team($data['participant']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }
}