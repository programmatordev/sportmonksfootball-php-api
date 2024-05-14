<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Market;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class MarketCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Market[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Market::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}