<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class ParticipantTrophy
{
    private int $id;

    private int $participantId;

    private int $leagueId;

    private int $seasonId;

    private int $trophyId;

    private ?Team $team;

    private ?League $league;

    private ?Season $season;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->participantId = $data['participant_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->trophyId = $data['trophy_id'];

        // include
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->league = isset($data['league']) ? new League($data['league']) : null;
        $this->season = isset($data['season']) ? new Season($data['season']) : null;

        // TODO trophy
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getParticipantId(): int
    {
        return $this->participantId;
    }

    public function getLeagueId(): int
    {
        return $this->leagueId;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getTrophyId(): int
    {
        return $this->trophyId;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }
}