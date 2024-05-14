<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TypeEntityCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TypeEntity[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(TypeEntity::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}