<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Topscorer;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TopscorerCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Topscorer[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Topscorer::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}