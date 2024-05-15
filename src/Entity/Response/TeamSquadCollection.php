<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\TeamSquad;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TeamSquadCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var TeamSquad[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(TeamSquad::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}