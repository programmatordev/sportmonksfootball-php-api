<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Commentary
{
    private int $id;

    private int $fixtureId;

    private ?string $comment;

    private ?int $minute;

    private ?int $extraMinute;

    private ?bool $isGoal;

    private ?bool $isImportant;

    private ?int $sortOrder;

    private ?Fixture $fixture;

    private ?Player $player;

    private ?Player $relatedPlayer;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->fixtureId = $data['fixture_id'];

        // select
        $this->comment = $data['comment'] ?? null;
        $this->minute = $data['minute'] ?? null;
        $this->extraMinute = $data['extra_minute'] ?? null;
        $this->isGoal = $data['is_goal'] ?? null;
        $this->isImportant = $data['is_important'] ?? null;
        $this->sortOrder = $data['order'] ?? null;

        // include
        $this->fixture = isset($data['fixture']) ? new Fixture($data['fixture']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->relatedPlayer = isset($data['relatedplayer']) ? new Player($data['relatedplayer']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFixtureId(): int
    {
        return $this->fixtureId;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getMinute(): ?int
    {
        return $this->minute;
    }

    public function getExtraMinute(): ?int
    {
        return $this->extraMinute;
    }

    public function isGoal(): ?bool
    {
        return $this->isGoal;
    }

    public function isImportant(): ?bool
    {
        return $this->isImportant;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function getFixture(): ?Fixture
    {
        return $this->fixture;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getRelatedPlayer(): ?Player
    {
        return $this->relatedPlayer;
    }
}