<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RefereeStatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var RefereeStatistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(RefereeStatistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}