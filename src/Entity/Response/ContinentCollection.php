<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class ContinentCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection($response['data'], Continent::class);
    }

    /**
     * @return Continent[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}