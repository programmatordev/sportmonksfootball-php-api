<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\League;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class LeagueCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var League[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(League::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}