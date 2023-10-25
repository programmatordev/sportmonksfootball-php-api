<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\City;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class CityCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var City[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(City::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}