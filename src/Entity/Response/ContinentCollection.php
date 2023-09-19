<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class ContinentCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Continent[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Continent::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}