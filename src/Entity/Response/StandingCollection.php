<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Standing;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class StandingCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Standing[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Standing::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}