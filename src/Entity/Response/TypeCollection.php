<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TypeCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Type[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Type::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}