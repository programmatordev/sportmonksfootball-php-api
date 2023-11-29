<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class ContinentCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Continent[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Continent::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}