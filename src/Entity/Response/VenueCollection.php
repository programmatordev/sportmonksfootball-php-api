<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class VenueCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Venue[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Venue::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}