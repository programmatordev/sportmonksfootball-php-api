<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Market;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class MarketCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Market[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Market::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}