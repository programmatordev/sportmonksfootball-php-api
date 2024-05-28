<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

class TimezoneCollection extends AbstractCollectionResponse
{
    /** @var string[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $data['data'];
    }

    public function getData(): array
    {
        return $this->data;
    }
}