<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Stage
{
    use EntityTrait;

    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $typeId;

    private ?string $name;

    private ?int $sortOrder;

    private ?bool $hasFinished;

    private ?bool $isCurrent;

    private ?\DateTimeImmutable $startAt;

    private ?\DateTimeImmutable $endAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?int $tieBreakerRuleId;

    private ?League $league;

    private ?Type $type;

    private ?Sport $sport;

    private ?Season $season;

    /** @var ?Round[] */
    private ?array $rounds;

    private ?Round $currentRound;

    /** @var ?Group[] */
    private ?array $groups;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    /** @var ?Aggregate[] */
    private ?array $aggregates;

    /** @var ?Statistic[] */
    private ?array $statistics;

    /** @var ?Topscorer[] */
    private ?array $topscorers;

    public function __construct(array $data, string $timezone)
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
        $this->startAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;
        $this->tieBreakerRuleId = $data['tie_breaker_rule_id'] ?? null;

        // include
        $this->league = isset($data['league']) ? new League($data['league'], $timezone) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->rounds = isset($data['rounds']) ? $this->createEntityCollection(Round::class, $data['rounds'], $timezone) : null;
        $this->currentRound = isset($data['currentround']) ? new Round($data['currentround'], $timezone) : null;
        $this->groups = isset($data['groups']) ? $this->createEntityCollection(Group::class, $data['groups']) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures'], $timezone) : null;
        $this->aggregates = isset($data['aggregates']) ? $this->createEntityCollection(Aggregate::class, $data['aggregates'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(Statistic::class, $data['statistics'], $timezone) : null;
        $this->topscorers = isset($data['topscorers']) ? $this->createEntityCollection(Topscorer::class, $data['topscorers'], $timezone) : null;
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

    public function hasFinished(): ?bool
    {
        return $this->hasFinished;
    }

    public function isCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
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

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getRounds(): ?array
    {
        return $this->rounds;
    }

    public function getCurrentRound(): ?Round
    {
        return $this->currentRound;
    }

    public function getGroups(): ?array
    {
        return $this->groups;
    }

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }

    public function getAggregates(): ?array
    {
        return $this->aggregates;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }

    public function getTopscorers(): ?array
    {
        return $this->topscorers;
    }
}