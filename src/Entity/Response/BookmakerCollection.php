<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class BookmakerCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Bookmaker[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Bookmaker::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}