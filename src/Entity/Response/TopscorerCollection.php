<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Topscorer;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class TopscorerCollection extends AbstractCollectionResponse
{
    use EntityCollectionTrait;

    /** @var Topscorer[] */
    private array $data;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->data = $this->createEntityCollection(Topscorer::class, $response['data'], $response['timezone']);
    }

    public function getData(): array
    {
        return $this->data;
    }
}