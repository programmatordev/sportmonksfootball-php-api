<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class MockResponse
{
    public const ABSTRACT_RESPONSE = '{"data":[],"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Continent"},"timezone":"UTC"}';

    public const CONTINENT_COLLECTION_RESPONSE = '{"data":[{"id":1,"name":"Europe","code":"EU"},{"id":2,"name":"Asia","code":"AS"}],"pagination":{"count":2,"per_page":2,"current_page":1,"next_page":"https:\/\/api.sportmonks.com\/v3\/core\/continents?per_page=2&order=asc&timezone=UTC&locale=en&page=2","has_more":true},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Continent"},"timezone":"UTC"}';
    public const CONTINENT_ITEM_RESPONSE = '{"data":{"id":1,"name":"Europe","code":"EU"},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Continent"},"timezone":"UTC"}';

    public const COUNTRY_COLLECTION_RESPONSE = '{"data":[{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"},{"id":5,"continent_id":7,"name":"Brazil","official_name":"Federative Republic of Brazil","fifa_name":"BRA","iso2":"BR","iso3":"BRA","latitude":"-10.81045150756836","longitude":"-52.97311782836914","borders":["ARG","BOL","COL","GUF","GUY","PRY","PER","SUR","URY","VEN"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/br.png"}],"pagination":{"count":2,"per_page":2,"current_page":1,"next_page":"https:\/\/api.sportmonks.com\/v3\/core\/countries?per_page=2&timezone=UTC&locale=en&page=2","has_more":true},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Country"},"timezone":"UTC"}';
    public const COUNTRY_ITEM_RESPONSE = '{"data":{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Country"},"timezone":"UTC"}';

    public const REGION_COLLECTION_RESPONSE = '{"data":[{"id":1,"country_id":107,"name":"Al Qadisiyah"},{"id":2,"country_id":802,"name":"HaTsafon"}],"pagination":{"count":2,"per_page":2,"current_page":1,"next_page":"https:\/\/api.sportmonks.com\/v3\/core\/regions?per_page=2&order=asc&timezone=UTC&locale=en&page=2","has_more":true},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Region"},"timezone":"UTC"}';
    public const REGION_ITEM_RESPONSE = '{"data":{"id":1,"country_id":107,"name":"Al Qadisiyah"},"subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Region"},"timezone":"UTC"}';

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