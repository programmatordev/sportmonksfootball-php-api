<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Entity;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class EntityCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Entity[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Entity::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}