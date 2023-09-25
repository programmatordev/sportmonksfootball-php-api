<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\PaginationValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeEntityCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TypeItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Pagination\Pagination;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

class TypeEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use PaginationValidatorTrait;

    protected int $cacheTtl = 3600 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(
        int $page = 1,
        int $perPage = Pagination::PER_PAGE,
        string $order = Pagination::ORDER_ASC
    ): TypeCollection
    {
        $this->validatePagination($page, $perPage, $order);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/types',
            query: [
                'page' => $page,
                'per_page' => $perPage,
                'order' => $order
            ]
        );

        return new TypeCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): TypeItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->formatPath('/v3/core/types/{id}', [
                'id' => $id
            ])
        );

        return new TypeItem($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getAllByEntity(): TypeEntityCollection
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/types/entities'
        );

        return new TypeEntityCollection($response);
    }
}