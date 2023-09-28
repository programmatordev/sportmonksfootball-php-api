<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class StageCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Stage[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Stage::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}