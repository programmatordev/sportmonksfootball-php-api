<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Event
{
    private int $id;

    private int $typeId;

    private ?int $subTypeId;

    private ?int $playerId;

    private ?int $relatedPlayerId;

    private int $periodId;

    private int $participantId;

    private ?string $section;

    private ?string $playerName;

    private ?string $relatedPlayerName;

    private ?string $result;

    private ?string $info;

    private ?string $additionalInfo;

    private ?int $minute;

    private ?int $extraMinute;

    private ?bool $isInjured;

    private ?bool $isOnBench;

    private ?int $coachId;

    private ?Fixture $fixture;

    private ?Type $type;

    private ?Type $subType;

    private ?Player $player;

    private ?Player $relatedPlayer;

    private ?Team $participant;

    private ?Period $period;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->typeId = $data['type_id'];
        $this->subTypeId = $data['sub_type_id'] ?? null;
        $this->playerId = $data['player_id'] ?? null;
        $this->relatedPlayerId = $data['related_player_id'] ?? null;
        $this->periodId = $data['period_id'];
        $this->participantId = $data['participant_id'];

        // select
        $this->section = $data['section'] ?? null;
        $this->playerName = $data['player_name'] ?? null;
        $this->relatedPlayerName = $data['related_player_name'] ?? null;
        $this->result = $data['result'] ?? null;
        $this->info = $data['info'] ?? null;
        $this->additionalInfo = $data['addition'] ?? null;
        $this->minute = $data['minute'] ?? null;
        $this->extraMinute = $data['extra_minute'] ?? null;
        $this->isInjured = $data['injured'] ?? null;
        $this->isOnBench = $data['on_bench'] ?? null;
        $this->coachId = $data['coach_id'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->subType = isset($data['subtype']) ? new Type($data['subtype']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->relatedPlayer = isset($data['relatedplayer']) ? new Player($data['relatedplayer']) : null;
        $this->participant = isset($data['participant']) ? new Team($data['participant']) : null;
        $this->period = isset($data['period']) ? new Period($data['period']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getSubTypeId(): ?int
    {
        return $this->subTypeId;
    }

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function getRelatedPlayerId(): ?int
    {
        return $this->relatedPlayerId;
    }

    public function getPeriodId(): int
    {
        return $this->periodId;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function getPlayerName(): ?string
    {
        return $this->playerName;
    }

    public function getRelatedPlayerName(): ?string
    {
        return $this->relatedPlayerName;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    public function getMinute(): ?int
    {
        return $this->minute;
    }

    public function getExtraMinute(): ?int
    {
        return $this->extraMinute;
    }

    public function isInjured(): ?bool
    {
        return $this->isInjured;
    }

    public function isOnBench(): ?bool
    {
        return $this->isOnBench;
    }

    public function getCoachId(): ?int
    {
        return $this->coachId;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getSubType(): ?Type
    {
        return $this->subType;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getRelatedPlayer(): ?Player
    {
        return $this->relatedPlayer;
    }

    public function getParticipant(): ?Team
    {
        return $this->participant;
    }

    public function getPeriod(): ?Period
    {
        return $this->period;
    }
}