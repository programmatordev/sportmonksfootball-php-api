<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class CoachStatisticDetail extends StatisticDetail
{
    private int $coachStatisticId;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->coachStatisticId = $data['coach_statistic_id'];
    }

    public function getCoachStatisticId(): int
    {
        return $this->coachStatisticId;
    }
}