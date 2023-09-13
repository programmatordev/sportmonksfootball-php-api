<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\FilterTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\PaginationValidatorTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\SelectTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

class CountryEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use SelectTrait;
    use IncludeTrait;
    use FilterTrait;
    use PaginationValidatorTrait;

    protected int $cacheTtl = 60 * 60 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(int $page = 1, int $perPage = self::PAGINATION_PER_PAGE): CountryCollection
    {
        $this->validatePagination($page, $perPage);

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/countries',
            query: [
                'page' => $page,
                'per_page' => $perPage
            ]
        );

        return new CountryCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): CountryItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->buildPath('/v3/core/countries/{id}', [
                'id' => $id
            ])
        );

        return new CountryItem($response);
    }

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getBySearchQuery(string $query, int $page = 1, int $perPage = self::PAGINATION_PER_PAGE): CountryCollection
    {
        Validator::notBlank()->assert($query, 'query');

        $this->validatePagination($page, $perPage);

        $response = $this->sendRequest(
            method: 'GET',
            path: $this->buildPath('/v3/core/countries/search/{query}', [
                'query' => $query
            ]),
            query: [
                'page' => $page,
                'per_page' => $perPage
            ]
        );

        return new CountryCollection($response);
    }
}