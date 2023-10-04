<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Rival
{
    private int $id;

    private int $sportId;

    private int $teamId;

    private int $rivalId;

    private ?Team $team;

    private ?Team $rival;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->teamId = $data['team_id'];
        $this->rivalId = $data['rival_id'];

        // include
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->rival = isset($data['rival']) ? new Team($data['rival']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getRivalId(): int
    {
        return $this->rivalId;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getRival(): ?Team
    {
        return $this->rival;
    }
}