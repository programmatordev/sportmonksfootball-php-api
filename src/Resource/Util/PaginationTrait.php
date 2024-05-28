<?php

namespace ProgrammatorDev\SportMonksFootball\Resource\Util;

use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use function DeepCopy\deep_copy;

trait PaginationTrait
{
    public function withPagination(
        int $page,
        int $perPage = Pagination::PER_PAGE,
        ?string $sortBy = null,
        string $order = Pagination::ORDER_ASC
    ): static
    {
        $clone = deep_copy($this, true);

        $clone->api->addQueryDefault('page', $page);
        $clone->api->addQueryDefault('per_page', $perPage);
        $clone->api->addQueryDefault('order', $order);

        if ($sortBy !== null) {
            $clone->api->addQueryDefault('sortBy', $sortBy);
        }

        return $clone;
    }

    public function withPage(int $page): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('page', $page);

        return $clone;
    }

    public function withPerPage(int $perPage): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('per_page', $perPage);

        return $clone;
    }

    public function withSortBy(string $sortBy): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('sortBy', $sortBy);

        return $clone;
    }

    public function withOrder(string $order): static
    {
        $clone = deep_copy($this, true);
        $clone->api->addQueryDefault('order', $order);

        return $clone;
    }
}