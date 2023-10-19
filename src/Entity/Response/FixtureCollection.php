<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class FixtureCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Fixture[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Fixture::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}