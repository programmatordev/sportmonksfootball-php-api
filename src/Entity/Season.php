<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Season
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $sportId;

    private int $leagueId;

    private ?int $tieBreakerRuleId;

    private ?string $name;

    private ?bool $hasFinished;

    private ?bool $isPending;

    private ?bool $isCurrent;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?\DateTimeImmutable $standingsRecalculatedAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?Sport $sport;

    private ?League $league;

    /** @var ?Stage[] */
    private ?array $stages;

    private ?Stage $currentStage;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    /** @var ?Team[] */
    private ?array $teams;

    /** @var ?Group[] */
    private ?array $groups;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];

        // select
        $this->tieBreakerRuleId = $data['tie_breaker_rule_id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->hasFinished = $data['finished'] ?? null;
        $this->isPending = $data['pending'] ?? null;
        $this->isCurrent = $data['is_current'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endingAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->standingsRecalculatedAt = isset($data['standings_recalculated_at']) ? new \DateTimeImmutable($data['standings_recalculated_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->league = isset($data['league']) ? new League($data['league']) : null;
        $this->stages = isset($data['stages']) ? $this->createEntityCollection(Stage::class, $data['stages']) : null;
        $this->currentStage = isset($data['currentstage']) ? new Stage($data['currentstage']) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures']) : null;
        $this->teams = isset($data['teams']) ? $this->createEntityCollection(Team::class, $data['teams']) : null;
        $this->groups = isset($data['groups']) ? $this->createEntityCollection(Group::class, $data['groups']) : null;

        // TODO statistics, topscorers
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

    public function getTieBreakerRuleId(): ?int
    {
        return $this->tieBreakerRuleId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function hasFinished(): ?bool
    {
        return $this->hasFinished;
    }

    public function isPending(): ?bool
    {
        return $this->isPending;
    }

    public function isCurrent(): ?bool
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

    public function getStandingsRecalculatedAt(): ?\DateTimeImmutable
    {
        return $this->standingsRecalculatedAt;
    }

    public function hasGamesInCurrentWeek(): ?bool
    {
        return $this->hasGamesInCurrentWeek;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getStages(): ?array
    {
        return $this->stages;
    }

    public function getCurrentStage(): ?Stage
    {
        return $this->currentStage;
    }

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }

    public function getTeams(): ?array
    {
        return $this->teams;
    }

    public function getGroups(): ?array
    {
        return $this->groups;
    }
}