<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class CountryCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection($response['data'], Country::class);
    }

    /**
     * @return Country[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}