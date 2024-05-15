<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CountryCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Country[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Country::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}