<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TypeCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Type[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Type::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}