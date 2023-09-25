<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Stage
{
    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $typeId;

    private ?string $name;

    private ?int $sortOrder;

    private ?bool $hasFinished;

    private ?bool $isCurrent;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?int $tieBreakerRuleId;

    private ?League $league;

    private ?Type $type;

    private ?Sport $sport;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->typeId = $data['type_id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->sortOrder = $data['sort_order'] ?? null;
        $this->hasFinished = $data['finished'] ?? null;
        $this->isCurrent = $data['is_current'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endingAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;
        $this->tieBreakerRuleId = $data['tie_breaker_rule_id'] ?? null;

        // include
        $this->league = isset($data['league']) ? new League($data['league']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;

        // TODO season, rounds, currentRound, groups, fixtures, aggregates, topscorers, statistics
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getLeagueId(): int
    {
        return $this->leagueId;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function getHasFinished(): ?bool
    {
        return $this->hasFinished;
    }

    public function getIsCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getEndingAt(): ?\DateTimeImmutable
    {
        return $this->endingAt;
    }

    public function hasGamesInCurrentWeek(): ?bool
    {
        return $this->hasGamesInCurrentWeek;
    }

    public function getTieBreakerRuleId(): ?int
    {
        return $this->tieBreakerRuleId;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }
}