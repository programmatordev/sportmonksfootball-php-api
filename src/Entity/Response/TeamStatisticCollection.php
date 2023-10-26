<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TeamStatistic;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TeamStatisticCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var TeamStatistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(TeamStatistic::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}