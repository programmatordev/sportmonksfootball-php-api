<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;

class FixtureItem extends AbstractResponse
{
    private Fixture $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Fixture($data['data'], $data['timezone']);
    }

    public function getData(): Fixture
    {
        return $this->data;
    }
}