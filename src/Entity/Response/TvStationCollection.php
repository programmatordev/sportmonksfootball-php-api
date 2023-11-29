<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class TvStationCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var TvStation[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(TvStation::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}