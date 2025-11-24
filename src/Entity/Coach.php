<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class Coach extends Person
{
    private int $playerId;

    private int $nationalityId;

    /** @var ?ParticipantTrophy[] */
    private ?array $trophies;

    private ?Player $player;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    /** @var ?TeamCoach[] */
    private ?array $teams;

    /** @var ?CoachStatistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->playerId = $data['player_id'];
        $this->nationalityId = $data['nationality_id'];

        // include
        $this->trophies = isset($data['trophies']) ? EntityHelper::createEntityCollection(ParticipantTrophy::class, $data['trophies']) : null;
        $this->player = isset($data['player']) ? new Player($data['player'], $timezone) : null;
        $this->fixtures = isset($data['fixtures']) ? EntityHelper::createEntityCollection(Fixture::class, $data['fixtures'], $timezone) : null;
        $this->teams = isset($data['teams']) ? EntityHelper::createEntityCollection(TeamCoach::class, $data['teams'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? EntityHelper::createEntityCollection(CoachStatistic::class, $data['statistics'], $timezone) : null;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getNationalityId(): int
    {
        return $this->nationalityId;
    }

    public function getTrophies(): ?array
    {
        return $this->trophies;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }

    public function getTeams(): ?array
    {
        return $this->teams;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}