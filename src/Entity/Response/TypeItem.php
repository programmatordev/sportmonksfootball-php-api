<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;

class TypeItem extends AbstractResponse
{
    private Type $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Type($response['data']);
    }

    public function getData(): Type
    {
        return $this->data;
    }
}