<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Type;

class TypeItem extends AbstractResponse
{
    private Type $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Type($data['data']);
    }

    public function getData(): Type
    {
        return $this->data;
    }
}