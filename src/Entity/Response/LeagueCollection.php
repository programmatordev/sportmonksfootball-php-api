<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\League;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class LeagueCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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