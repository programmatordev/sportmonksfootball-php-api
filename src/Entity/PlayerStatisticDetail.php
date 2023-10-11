<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class PlayerStatisticDetail extends StatisticDetail
{
    private int $playerStatisticId;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->playerStatisticId = $data['player_statistic_id'];
    }

    public function getPlayerStatisticId(): int
    {
        return $this->playerStatisticId;
    }
}