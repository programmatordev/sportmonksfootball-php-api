<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class LineupDetail
{
    private int $id;

    private int $fixtureId;

    private int $playerId;

    private int $teamId;

    private int $lineupId;

    private int $typeId;

    private array $data;

    private ?Fixture $fixture;

    private ?Type $type;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];
        $this->playerId = $data['player_id'];
        $this->teamId = $data['team_id'];
        $this->lineupId = $data['lineup_id'];
        $this->typeId = $data['type_id'];
        $this->data = $data['data'];

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture'], $timezone) : null;
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

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getLineupId(): int
    {
        return $this->lineupId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}