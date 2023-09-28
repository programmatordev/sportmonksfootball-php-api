<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;

class StageItem extends AbstractResponse
{
    private Stage $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = new Stage($response['data']);
    }

    public function getData(): Stage
    {
        return $this->data;
    }
}