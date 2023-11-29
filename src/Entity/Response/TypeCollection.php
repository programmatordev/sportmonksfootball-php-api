<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class TypeCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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