<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Referee;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class RefereeCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Referee[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Referee::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}