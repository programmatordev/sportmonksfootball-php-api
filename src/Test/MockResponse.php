<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class MockResponse
{
    public const ABSTRACT_RESPONSE = '{"data":[],"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Continent"},"timezone":"UTC"}';

    public const CONTINENT_COLLECTION_RESPONSE = '{"data":[{"id":1,"name":"Europe","code":"EU"},{"id":2,"name":"Asia","code":"AS"}],"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';
    public const CONTINENT_ITEM_RESPONSE = '{"data":{"id":1,"name":"Europe","code":"EU"},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';

    public const ERROR_NO_RESULTS = '{"message":"Error message","subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';
    public const ERROR_PROPERTY_CODE = '{"message":"Error message","link":"https:\/\/docs.sportmonks.com\/football\/api\/response-codes\/include-exceptions","code":{{ code }}}';
    public const ERROR_STATUS_CODE = '{"message":"Error message"}';

    /**
     * Helper to replace dynamic content in responses for testing
     */
    public static function buildResponse(string $response, array $parameters): string
    {
        foreach ($parameters as $parameter => $value) {
            $response = \str_replace(\sprintf("{{ %s }}", $parameter), $value, $response);
        }

        return $response;
    }
}