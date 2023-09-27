<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class StateCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var State[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(State::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}