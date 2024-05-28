<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class StageCollection extends AbstractCollectionResponse
{
    use EntityTrait;

    /** @var Stage[] */
    private array $data;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data = $this->createEntityCollection(Stage::class, $data['data'], $data['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}