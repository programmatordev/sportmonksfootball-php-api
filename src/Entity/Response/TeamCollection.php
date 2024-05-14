<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Team;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TeamCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Team[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Team::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}