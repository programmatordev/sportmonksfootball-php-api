<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\FilterEntity;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class FilterEntityCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var FilterEntity[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(FilterEntity::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}