<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Season;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class SeasonCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

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