<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\FilterEntity;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class FilterEntityCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var FilterEntity[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(FilterEntity::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}