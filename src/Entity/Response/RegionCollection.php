<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class RegionCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Region[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Region::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}