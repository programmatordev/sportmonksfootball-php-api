<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class StatisticCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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