<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\CoachStatistic;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class CoachStatisticCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var CoachStatistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(CoachStatistic::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}