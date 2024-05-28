<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;

class TransferItem extends AbstractResponse
{
    private Transfer $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Transfer($data['data'], $data['timezone']);
    }

    public function getData(): Transfer
    {
        return $this->data;
    }
}