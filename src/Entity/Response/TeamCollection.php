<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Team;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class TeamCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Team[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Team::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}