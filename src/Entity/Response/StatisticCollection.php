<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class StatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Statistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Statistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}