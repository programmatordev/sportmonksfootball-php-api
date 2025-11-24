<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class BookmakerCollection extends AbstractCollectionResponse
{
    /** @var Bookmaker[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Bookmaker::class, $data['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}