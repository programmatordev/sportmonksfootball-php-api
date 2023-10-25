<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;

class FixtureItem extends AbstractResponse
{
    private Fixture $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Fixture($response['data'], $response['timezone']);
    }

    public function getData(): Fixture
    {
        return $this->data;
    }
}