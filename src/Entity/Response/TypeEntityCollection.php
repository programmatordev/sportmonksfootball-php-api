<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class TypeEntityCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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