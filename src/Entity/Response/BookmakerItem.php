<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;

class BookmakerItem extends AbstractResponse
{
    private Bookmaker $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Bookmaker($data['data']);
    }

    public function getData(): Bookmaker
    {
        return $this->data;
    }
}