<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TypeEntityCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TypeEntity[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(TypeEntity::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}