<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TeamSquad;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TeamSquadCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TeamSquad[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(TeamSquad::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}