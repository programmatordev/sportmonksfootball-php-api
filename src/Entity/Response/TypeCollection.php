<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class TypeCollection extends AbstractCollectionResponse
{
    /** @var Type[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Type::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}