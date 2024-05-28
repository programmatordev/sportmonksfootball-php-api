<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TeamStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TeamStatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TeamStatistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(TeamStatistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}