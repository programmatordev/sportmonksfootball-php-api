<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class StateCollection extends AbstractCollectionResponse
{
    /** @var State[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(State::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}