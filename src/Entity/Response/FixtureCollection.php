<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class FixtureCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Fixture[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Fixture::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}