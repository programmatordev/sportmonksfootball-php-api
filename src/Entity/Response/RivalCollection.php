<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Rival;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class RivalCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Rival[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Rival::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}