<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Pagination
{
    private int $count;

    private int $perPage;

    private int $currentPage;

    private ?string $nextPage;

    private bool $hasMore;

    public function __construct(array $data)
    {
        $this->count = $data['count'];
        $this->perPage = $data['per_page'];
        $this->currentPage = $data['current_page'];
        $this->nextPage = $data['next_page'];
        $this->hasMore = $data['has_more'];
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getNextPage(): ?string
    {
        return $this->nextPage;
    }

    public function hasMore(): bool
    {
        return $this->hasMore;
    }
}