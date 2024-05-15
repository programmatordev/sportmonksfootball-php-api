<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CoachCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Coach[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Coach::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}