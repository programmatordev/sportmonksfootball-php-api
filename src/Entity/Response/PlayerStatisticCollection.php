<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class PlayerStatisticCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var PlayerStatistic[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(PlayerStatistic::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}