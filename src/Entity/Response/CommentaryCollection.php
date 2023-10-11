<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Commentary;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class CommentaryCollection extends AbstractCollectionResponse
{
    use CreateEntityCollectionTrait;

    /** @var Commentary[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Commentary::class, $response['data']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}