<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;

class TransferItem extends AbstractResponse
{
    private Transfer $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Transfer($response['data'], $response['timezone']);
    }

    public function getData(): Transfer
    {
        return $this->data;
    }
}