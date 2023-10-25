<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class FixtureSidelined
{
    private int $id;

    private int $fixtureId;

    private int $sidelinedId;

    private int $participantId;

    private ?Fixture $fixture;

    private ?Sidelined $sidelined;

    private ?Team $participant;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->sidelinedId = $data['sideline_id'];
        $this->participantId = $data['participant_id'];

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
        $this->sidelined = isset($data['sideline']) ? new Sidelined($data['sideline'], $timezone) : null;
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

    public function getSidelinedId(): int
    {
        return $this->sidelinedId;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getSidelined(): ?Sidelined
    {
        return $this->sidelined;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }
}