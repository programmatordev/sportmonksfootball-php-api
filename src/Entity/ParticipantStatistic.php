<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class ParticipantStatistic
{
    private int $id;

    private int $seasonId;

    private ?Season $season;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->seasonId = $data['season_id'];

        // include
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }
}