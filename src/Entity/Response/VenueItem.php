<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;

class VenueItem extends AbstractResponse
{
    private Venue $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Venue($response['data'], $response['timezone']);
    }

    public function getData(): Venue
    {
        return $this->data;
    }
}