<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Sidelined
{
    private int $id;

    private int $playerId;

    private int $typeId;

    private int $teamId;

    private ?int $seasonId;

    private ?string $category;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?int $gamesMissed;

    private ?bool $isCompleted;

    private ?Team $team;

    private ?Season $season;

    private ?Type $type;

    private ?Player $player;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->playerId = $data['player_id'];
        $this->typeId = $data['type_id'];
        $this->teamId = $data['team_id'];
        $this->seasonId = $data['season_id'] ?? null;

        // select
        $this->category = $data['category'] ?? null;
        $this->startingAt = isset($data['start_date']) ? new \DateTimeImmutable($data['start_date']) : null;
        $this->endingAt = isset($data['end_date']) ? new \DateTimeImmutable($data['end_date']) : null;
        $this->gamesMissed = $data['games_missed'] ?? null;
        $this->isCompleted = $data['completed'];

        // include
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->season = isset($data['season']) ? new Season($data['season']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getSeasonId(): ?int
    {
        return $this->seasonId;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getEndingAt(): ?\DateTimeImmutable
    {
        return $this->endingAt;
    }

    public function getGamesMissed(): ?int
    {
        return $this->gamesMissed;
    }

    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }
}