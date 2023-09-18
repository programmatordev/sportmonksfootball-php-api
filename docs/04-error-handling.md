# Error Handling

- [API Errors](#api-errors)
- [Validation Errors](#validation-errors)

## API Errors

To handle API response errors, multiple exceptions are provided.

All API errors do not count towards the rate limit, except for the `NoResultsFoundException`.
For this reason, this exception (only) includes the `getRateLimit()`, `getSubscriptions()` and `getTimezone()` methods.

You can see all available exceptions below:

```php
try {
    // TODO
}
// When the query did not return any results (for example, the requested id does not exist)
// or there is no access via the current subscription
catch (NoResultsFoundException $exception) {
    echo $exception->getMessage();
    echo $exception->getRateLimit()->getRemainingNumRequests();
}
// https://docs.sportmonks.com/football/api/error-codes
catch (BadRequestException $exception) {}
catch (UnauthorizedException $exception) {}
catch (ForbiddenException $exception) {}
catch (TooManyRequestsException $exception) {}
// https://docs.sportmonks.com/football/api/error-codes/include-exceptions
catch (IncludeNotAllowedException $exception) {}
catch (IncludeNotFoundException $exception) {}
catch (IncludeDepthException $exception) {}
catch (IncludeNotAvailableException $exception) {}
//https://docs.sportmonks.com/football/api/error-codes/filtering-and-complexity-exceptions
catch (QueryComplexityException $exception) {}
catch (InvalidQueryParameterException $exception) {}
catch (FilterNotApplicableException $exception) {}
// https://docs.sportmonks.com/football/api/error-codes/other-exceptions
catch (PaginationLimitException $exception) {}
catch (RateLimitException $exception) {}
catch (InsufficientResourcesException $exception) {}
catch (InsufficientIncludesException $exception) {}
// Any other error
catch (UnexpectedErrorException $exception) {}
```

To catch all API errors with a single exception, `ApiErrorException` is available:

```php
use ProgrammatorDev\OpenWeatherMap\Exception\ApiErrorException;

try {
    // TODO
}
// Catches all API response errors
catch (ApiErrorException $exception) {
    echo $exception->getCode();
    echo $exception->getMessage();
}
```

## Validation Errors

To catch invalid input data, the `ValidationException` is available:

```php
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

try {
    // TODO
}
catch (ValidationException $exception) {
    // Should print:
    // TODO
    echo $exception->getMessage();
}
```