<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class ContinentCollection extends AbstractCollectionResponse
{
    /** @var Continent[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Continent::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}