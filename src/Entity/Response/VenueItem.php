<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;

class VenueItem extends AbstractResponse
{
    private Venue $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Venue($data['data'], $data['timezone']);
    }

    public function getData(): Venue
    {
        return $this->data;
    }
}