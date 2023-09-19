<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class RegionCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Region::class, $response['data']);
    }

    /**
     * @return Region[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}