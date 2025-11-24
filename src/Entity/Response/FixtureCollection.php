<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class FixtureCollection extends AbstractCollectionResponse
{
    /** @var Fixture[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Fixture::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}