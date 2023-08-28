<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

class AbstractItemResponse extends AbstractResponse
{
    private mixed $data;

    public function __construct(array $response, string $entityClass)
    {
        parent::__construct($response);

        $this->data = new $entityClass($response['data']);
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}