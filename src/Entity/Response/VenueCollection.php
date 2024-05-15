<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class VenueCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Venue[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Venue::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}