<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class PlayerStatisticCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var PlayerStatistic[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(PlayerStatistic::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}