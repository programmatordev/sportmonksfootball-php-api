<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class StandingCorrection
{
    private int $id;

    private int $seasonId;

    private int $stageId;

    private ?int $groupId;

    private int $typeId;

    private int $participantId;

    private ?string $participantType;

    private ?int $value;

    private ?string $calcType;

    private ?bool $isActive;

    private ?Team $participant;

    private ?Season $season;

    private ?Stage $stage;

    private ?Group $group;

    private ?Type $type;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];
        $this->groupId = $data['group_id'] ?? null;
        $this->typeId = $data['type_id'];
        $this->participantId = $data['participant_id'];

        // select
        $this->participantType = $data['participant_type'] ?? null;
        $this->value = $data['value'] ?? null;
        $this->calcType = $data['calc_type'] ?? null;
        $this->isActive = $data['active'] ?? null;

        // include
        $this->participant = isset($data['participant']) ? new Team($data['participant'], $timezone) : null;
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage'], $timezone) : null;
        $this->group = isset($data['group']) ? new Group($data['group']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getStageId(): int
    {
        return $this->stageId;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getParticipantType(): ?string
    {
        return $this->participantType;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function getCalcType(): ?string
    {
        return $this->calcType;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }
}