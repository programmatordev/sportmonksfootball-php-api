<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class StatisticCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Statistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Statistic::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}