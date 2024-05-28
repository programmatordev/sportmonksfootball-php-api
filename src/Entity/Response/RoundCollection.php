<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Round;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RoundCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Round[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Round::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}