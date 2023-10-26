<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Season;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class SeasonCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Season[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Season::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}