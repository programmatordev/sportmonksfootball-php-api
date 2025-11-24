<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\CoachStatistic;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class CoachStatisticCollection extends AbstractCollectionResponse
{
    /** @var CoachStatistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(CoachStatistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}