<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TeamSquad;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TeamSquadCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var TeamSquad[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(TeamSquad::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}