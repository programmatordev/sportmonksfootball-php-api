<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\LanguageTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\ContinentItem;
use ProgrammatorDev\SportMonksFootball\Exception\BadRequestException;
use ProgrammatorDev\SportMonksFootball\Exception\ForbiddenException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeDepthException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAllowedException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAvailableException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\InnaplicableFilterException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientIncludesException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientResourcesException;
use ProgrammatorDev\SportMonksFootball\Exception\InvalidQueryParameterException;
use ProgrammatorDev\SportMonksFootball\Exception\NoResultsFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\NotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\PaginationLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\QueryComplexityException;
use ProgrammatorDev\SportMonksFootball\Exception\RateLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\TooManyRequestsException;
use ProgrammatorDev\SportMonksFootball\Exception\UnauthorizedException;
use ProgrammatorDev\SportMonksFootball\Exception\UnexpectedErrorException;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;

class ContinentEndpoint extends AbstractEndpoint
{
    use LanguageTrait;

    protected int $cacheTtl = 60 * 60; // 1 hour

    /**
     * @throws Exception
     * @throws ValidationException
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws IncludeDepthException
     * @throws IncludeNotAllowedException
     * @throws IncludeNotAvailableException
     * @throws IncludeNotFoundException
     * @throws InnaplicableFilterException
     * @throws InsufficientIncludesException
     * @throws InsufficientResourcesException
     * @throws InvalidQueryParameterException
     * @throws NoResultsFoundException
     * @throws NotFoundException
     * @throws PaginationLimitException
     * @throws QueryComplexityException
     * @throws RateLimitException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     * @throws UnexpectedErrorException
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
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws IncludeDepthException
     * @throws IncludeNotAllowedException
     * @throws IncludeNotAvailableException
     * @throws IncludeNotFoundException
     * @throws InnaplicableFilterException
     * @throws InsufficientIncludesException
     * @throws InsufficientResourcesException
     * @throws InvalidQueryParameterException
     * @throws NoResultsFoundException
     * @throws NotFoundException
     * @throws PaginationLimitException
     * @throws QueryComplexityException
     * @throws RateLimitException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     * @throws UnexpectedErrorException
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