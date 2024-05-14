<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Referee;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RefereeCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Referee[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Referee::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}