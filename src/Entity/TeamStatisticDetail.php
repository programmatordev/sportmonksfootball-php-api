<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class TeamStatisticDetail extends StatisticDetail
{
    private int $teamStatisticId;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->teamStatisticId = $data['team_statistic_id'];
    }

    public function getTeamStatisticId(): int
    {
        return $this->teamStatisticId;
    }
}