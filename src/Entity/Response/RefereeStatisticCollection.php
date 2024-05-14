<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RefereeStatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var RefereeStatistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(RefereeStatistic::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}