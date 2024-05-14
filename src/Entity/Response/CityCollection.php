<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\City;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CityCollection extends AbstractCollectionResponse
{
    use EntityTrait;

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