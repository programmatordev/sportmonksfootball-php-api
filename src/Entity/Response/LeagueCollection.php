<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\League;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class LeagueCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var League[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(League::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}