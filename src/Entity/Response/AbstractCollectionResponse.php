<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class AbstractCollectionResponse extends AbstractResponse
{
    use CreateEntityCollectionTrait;

    private array $data;

    public function __construct(array $response, string $entityClass)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection($response['data'], $entityClass);
    }

    public function getData(): array
    {
        return $this->data;
    }
}