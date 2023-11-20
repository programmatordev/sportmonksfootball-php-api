<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

class TimezoneCollection extends AbstractCollectionResponse
{
    /** @var string[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $response['data'];
    }

    public function getData(): array
    {
        return $this->data;
    }
}