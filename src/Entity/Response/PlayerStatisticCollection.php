<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class PlayerStatisticCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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