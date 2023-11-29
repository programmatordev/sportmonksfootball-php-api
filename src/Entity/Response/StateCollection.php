<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class StateCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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