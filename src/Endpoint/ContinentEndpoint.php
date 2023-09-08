<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\IncludeTrait;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentItem;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

class ContinentEndpoint extends AbstractEndpoint
{
    use LanguageTrait;
    use IncludeTrait;

    protected int $cacheTtl = 60 * 60 * 24; // 1 day

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws ApiErrorException
     */
    public function getAll(int $page = 1): ContinentCollection
    {
        Validator::greaterThan(0)->assert($page, 'page');

        $response = $this->sendRequest(
            method: 'GET',
            path: '/v3/core/continents',
            query: [
                'page' => $page
            ]
        );

        return new ContinentCollection($response);
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    public function getById(int $id): ContinentItem
    {
        $response = $this->sendRequest(
            method: 'GET',
            path: $this->buildPath('/v3/core/continents/{id}', [
                'id' => $id
            ])
        );

        return new ContinentItem($response);
    }
}