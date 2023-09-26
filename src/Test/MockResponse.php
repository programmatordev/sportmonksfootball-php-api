<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class MockResponse
{
    public const ABSTRACT_ITEM_RESPONSE = '{"data":%data%,"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';
    public const ABSTRACT_COLLECTION_RESPONSE = '{"data":%data%,"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';

    public const CITY_ITEM_DATA = '{"id":1,"country_id":107,"region_id":1,"name":"\'Afak","latitude":"24.84926","longitude":"46.84591"}';
    public const CITY_COLLECTION_DATA = '[{"id":1,"country_id":107,"region_id":1,"name":"\'Afak","latitude":"24.84926","longitude":"46.84591"},{"id":2,"country_id":802,"region_id":2,"name":"\'Afula \'Illit","latitude":"32.61197","longitude":"35.28753"}]';

    public const CONTINENT_ITEM_DATA = '{"id":1,"name":"Europe","code":"EU"}';
    public const CONTINENT_COLLECTION_DATA = '[{"id":1,"name":"Europe","code":"EU"},{"id":2,"name":"Asia","code":"AS"}]';

    public const COUNTRY_ITEM_DATA = '{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"}';
    public const COUNTRY_COLLECTION_DATA = '[{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"},{"id":5,"continent_id":7,"name":"Brazil","official_name":"Federative Republic of Brazil","fifa_name":"BRA","iso2":"BR","iso3":"BRA","latitude":"-10.81045150756836","longitude":"-52.97311782836914","borders":["ARG","BOL","COL","GUF","GUY","PRY","PER","SUR","URY","VEN"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/br.png"}]';

    public const FILTER_ENTITY_COLLECTION_DATA = '{"aggregate":["aggregateLeagues","aggregateSeasons","aggregateStages"],"coach":["coachCountries"]}';

    public const LEAGUE_ITEM_DATA = '{"id":271,"sport_id":1,"country_id":320,"name":"Superliga","active":true,"short_code":"DNK SL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/271.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-25 17:00:00","category":2,"has_jerseys":false}';
    public const LEAGUE_COLLECTION_DATA = '[{"id":271,"sport_id":1,"country_id":320,"name":"Superliga","active":true,"short_code":"DNK SL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/271.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-25 17:00:00","category":2,"has_jerseys":false},{"id":501,"sport_id":1,"country_id":1161,"name":"Premiership","active":true,"short_code":"SCO P","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/501.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-24 14:00:00","category":2,"has_jerseys":false}]';

    public const REGION_ITEM_DATA = '{"id":1,"country_id":107,"name":"Al Qadisiyah"}';
    public const REGION_COLLECTION_DATA = '[{"id":1,"country_id":107,"name":"Al Qadisiyah"},{"id":2,"country_id":802,"name":"HaTsafon"}]';

    public const TYPE_ITEM_DATA = '{"id":1,"name":"1st Half","code":"1st-half","developer_name":"1ST_HALF","model_type":"period","stat_group":null}';
    public const TYPE_COLLECTION_DATA = '[{"id":1,"name":"1st Half","code":"1st-half","developer_name":"1ST_HALF","model_type":"period","stat_group":null},{"id":2,"name":"2nd Half","code":"2nd-half","developer_name":"2ND_HALF","model_type":"period","stat_group":null}]';
    public const TYPE_ENTITY_COLLECTION_DATA = '{"CoachStatisticDetail":{"updated_at":"2023-09-21T16:20:39.000000Z","types":[{"id":59,"name":"Substitutions","code":"substitutions","developer_name":"SUBSTITUTIONS","model_type":"statistic","stat_group":"overall"},{"id":83,"name":"Redcards","code":"redcards","developer_name":"REDCARDS","model_type":"statistic","stat_group":"overall"}]},"Event":{"updated_at":"2023-09-21T16:20:40.000000Z","types":[{"id":10,"name":"VAR","code":"VAR","developer_name":"VAR","model_type":"event","stat_group":null},{"id":14,"name":"Goal","code":"goal","developer_name":"GOAL","model_type":"event","stat_group":null}]}}';

    public const ERROR_NO_RESULTS = '{"message":"Error message","subscription":[{"meta":[],"plans":[{"plan":"Test","sport":"Test","category":"Test"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';
    public const ERROR_PROPERTY_CODE = '{"message":"Error message","link":"https:\/\/docs.sportmonks.com\/football\/api\/response-codes\/include-exceptions","code":%code%}';
    public const ERROR_STATUS_CODE = '{"message":"Error message"}';

    public static function buildItemResponse(string $data): string
    {
        return self::formatResponse(self::ABSTRACT_ITEM_RESPONSE, [
            'data' => $data
        ]);
    }

    public static function buildCollectionResponse(string $data): string
    {
        return self::formatResponse(self::ABSTRACT_COLLECTION_RESPONSE, [
            'data' => $data
        ]);
    }

    /**
     * Helper to replace dynamic content in responses for testing
     */
    public static function formatResponse(string $response, array $parameters): string
    {
        foreach ($parameters as $parameter => $value) {
            $response = \str_replace(\sprintf("%%%s%%", $parameter), $value, $response);
        }

        return $response;
    }
}