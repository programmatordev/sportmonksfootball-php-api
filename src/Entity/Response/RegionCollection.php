<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RegionCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Region[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Region::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}