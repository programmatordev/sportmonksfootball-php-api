<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Topscorer
{
    private int $id;

    private ?int $seasonId;

    private int $playerId;

    private int $typeId;

    private int $participantId;

    private int $position;

    private int $total;

    private ?Season $season;

    private ?Stage $stage;

    private ?Player $player;

    private ?Team $participant;

    private ?Type $type;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->seasonId = $data['season_id'] ?? null;
        $this->playerId = $data['player_id'];
        $this->typeId = $data['type_id'];
        $this->participantId = $data['participant_id'];
        $this->position = $data['position'];
        $this->total = $data['total'];

        // include
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage'], $timezone) : null;
        $this->player = isset($data['player']) ? new Player($data['player'], $timezone) : null;
        $this->participant = isset($data['participant']) ? new Team($data['participant'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSeasonId(): ?int
    {
        return $this->seasonId;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
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