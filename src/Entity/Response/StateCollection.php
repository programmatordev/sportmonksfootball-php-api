<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class StateCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var State[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(State::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}