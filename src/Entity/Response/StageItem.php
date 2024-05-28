<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;

class StageItem extends AbstractResponse
{
    private Stage $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = new Stage($data['data'], $data['timezone']);
    }

    public function getData(): Stage
    {
        return $this->data;
    }
}