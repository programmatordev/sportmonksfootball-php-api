<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class PlayerStatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var PlayerStatistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(PlayerStatistic::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}