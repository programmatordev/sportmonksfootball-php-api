<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class CountryCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Country[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Country::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}