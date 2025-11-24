<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class StatisticCollection extends AbstractCollectionResponse
{
    /** @var Statistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Statistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}