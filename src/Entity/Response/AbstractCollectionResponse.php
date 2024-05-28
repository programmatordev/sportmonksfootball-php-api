<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Pagination;

class AbstractCollectionResponse extends AbstractResponse
{
    private ?Pagination $pagination;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->pagination = isset($data['pagination'])
            ? new Pagination($data['pagination'])
            : null;
    }

    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }
}