<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TypeEntity;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class TypeEntityCollection extends AbstractCollectionResponse
{
    /** @var TypeEntity[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(TypeEntity::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}