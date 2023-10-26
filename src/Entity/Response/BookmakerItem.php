<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;

class BookmakerItem extends AbstractResponse
{
    private Bookmaker $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Bookmaker($response['data']);
    }

    public function getData(): Bookmaker
    {
        return $this->data;
    }
}