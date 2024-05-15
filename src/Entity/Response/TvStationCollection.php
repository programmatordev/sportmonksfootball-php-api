<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TvStationCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TvStation[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(TvStation::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}