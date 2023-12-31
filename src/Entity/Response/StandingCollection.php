<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Standing;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class StandingCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Standing[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Standing::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}