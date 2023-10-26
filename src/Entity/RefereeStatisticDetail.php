<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class RefereeStatisticDetail extends StatisticDetail
{
    private int $refereeStatisticId;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->refereeStatisticId = $data['referee_statistic_id'];
    }

    public function getRefereeStatisticId(): int
    {
        return $this->refereeStatisticId;
    }
}