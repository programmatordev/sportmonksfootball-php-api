<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Odd;
use ProgrammatorDev\SportMonksFootball\Helper\EntityHelper;

class OddCollection extends AbstractCollectionResponse
{
    /** @var Odd[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = EntityHelper::createEntityCollection(Odd::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}