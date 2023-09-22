<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Pagination;

class AbstractCollectionResponse extends AbstractResponse
{
    private Pagination $pagination;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->pagination = new Pagination($response['pagination']);
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}