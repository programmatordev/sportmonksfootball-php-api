<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class MockResponse
{
    public const ABSTRACT_ITEM_RESPONSE = '{"data":%data%,"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';
    public const ABSTRACT_COLLECTION_RESPONSE = '{"data":%data%,"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Test"},"timezone":"UTC"}';

    public const CITY_ITEM_DATA = '{"id":1,"country_id":107,"region_id":1,"name":"\'Afak","latitude":"24.84926","longitude":"46.84591"}';
    public const CITY_COLLECTION_DATA = '[{"id":1,"country_id":107,"region_id":1,"name":"\'Afak","latitude":"24.84926","longitude":"46.84591"},{"id":2,"country_id":802,"region_id":2,"name":"\'Afula \'Illit","latitude":"32.61197","longitude":"35.28753"}]';

    public const COACH_ITEM_DATA = '{"id":50,"player_id":50,"sport_id":1,"country_id":462,"nationality_id":462,"city_id":null,"common_name":"S. Gerrard","firstname":"Steven","lastname":"Gerrard","name":"Steven Gerrard","display_name":"Steven Gerrard","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/players\/18\/50.png","height":183,"weight":83,"date_of_birth":"1980-05-30","gender":"male"}';
    public const COACH_COLLECTION_DATA = '[{"id":50,"player_id":50,"sport_id":1,"country_id":462,"nationality_id":462,"city_id":null,"common_name":"S. Gerrard","firstname":"Steven","lastname":"Gerrard","name":"Steven Gerrard","display_name":"Steven Gerrard","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/players\/18\/50.png","height":183,"weight":83,"date_of_birth":"1980-05-30","gender":"male"},{"id":220,"player_id":220,"sport_id":1,"country_id":1161,"nationality_id":1161,"city_id":null,"common_name":"G. Murty","firstname":"Graeme","lastname":"Murty","name":"Graeme Murty","display_name":"Graeme Murty","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/placeholder.png","height":178,"weight":null,"date_of_birth":"1974-11-13","gender":"male"}]';

    public const COMMENTARY_COLLECTION_DATA = '[{"id":1,"fixture_id":18444499,"comment":"First Half starts.","minute":null,"extra_minute":null,"is_goal":false,"is_important":false,"order":1},{"id":2,"fixture_id":18444499,"comment":"Corner -  Brisbane Roar FC. Conceded by Nicholas Pennington.","minute":2,"extra_minute":null,"is_goal":false,"is_important":false,"order":2}]';

    public const CONTINENT_ITEM_DATA = '{"id":1,"name":"Europe","code":"EU"}';
    public const CONTINENT_COLLECTION_DATA = '[{"id":1,"name":"Europe","code":"EU"},{"id":2,"name":"Asia","code":"AS"}]';

    public const COUNTRY_ITEM_DATA = '{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"}';
    public const COUNTRY_COLLECTION_DATA = '[{"id":2,"continent_id":1,"name":"Poland","official_name":"Republic of Poland","fifa_name":"POL","iso2":"PL","iso3":"POL","latitude":"52.147850036621094","longitude":"19.37775993347168","borders":["BLR","CZE","DEU","LTU","RUS","SVK","UKR"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/pl.png"},{"id":5,"continent_id":7,"name":"Brazil","official_name":"Federative Republic of Brazil","fifa_name":"BRA","iso2":"BR","iso3":"BRA","latitude":"-10.81045150756836","longitude":"-52.97311782836914","borders":["ARG","BOL","COL","GUF","GUY","PRY","PER","SUR","URY","VEN"],"image_path":"https:\/\/cdn.sportmonks.com\/images\/countries\/png\/short\/br.png"}]';

    public const FILTER_ENTITY_COLLECTION_DATA = '{"aggregate":["aggregateLeagues","aggregateSeasons","aggregateStages"],"coach":["coachCountries"]}';

    public const LEAGUE_ITEM_DATA = '{"id":271,"sport_id":1,"country_id":320,"name":"Superliga","active":true,"short_code":"DNK SL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/271.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-25 17:00:00","category":2,"has_jerseys":false}';
    public const LEAGUE_COLLECTION_DATA = '[{"id":271,"sport_id":1,"country_id":320,"name":"Superliga","active":true,"short_code":"DNK SL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/271.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-25 17:00:00","category":2,"has_jerseys":false},{"id":501,"sport_id":1,"country_id":1161,"name":"Premiership","active":true,"short_code":"SCO P","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/leagues\/501.png","type":"league","sub_type":"domestic","last_played_at":"2023-09-24 14:00:00","category":2,"has_jerseys":false}]';

    public const PLAYER_ITEM_DATA = '{"id":14,"sport_id":1,"country_id":320,"nationality_id":320,"city_id":null,"position_id":25,"detailed_position_id":null,"type_id":25,"common_name":"D. Agger","firstname":"Daniel Munthe","lastname":"Agger","name":"Daniel Munthe Agger","display_name":"Daniel Agger","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/players\/14\/14.png","height":191,"weight":84,"date_of_birth":"1984-12-12","gender":"male"}';
    public const PLAYER_COLLECTION_DATA = '[{"id":14,"sport_id":1,"country_id":320,"nationality_id":320,"city_id":null,"position_id":25,"detailed_position_id":null,"type_id":25,"common_name":"D. Agger","firstname":"Daniel Munthe","lastname":"Agger","name":"Daniel Munthe Agger","display_name":"Daniel Agger","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/players\/14\/14.png","height":191,"weight":84,"date_of_birth":"1984-12-12","gender":"male"},{"id":21,"sport_id":1,"country_id":455,"nationality_id":455,"city_id":null,"position_id":26,"detailed_position_id":null,"type_id":26,"common_name":"L. Miller","firstname":"Liam","lastname":"Miller","name":"Liam Miller","display_name":"Liam Miller","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/players\/21\/21.png","height":170,"weight":66,"date_of_birth":"1981-02-13","gender":"male"}]';

    public const REGION_ITEM_DATA = '{"id":1,"country_id":107,"name":"Al Qadisiyah"}';
    public const REGION_COLLECTION_DATA = '[{"id":1,"country_id":107,"name":"Al Qadisiyah"},{"id":2,"country_id":802,"name":"HaTsafon"}]';

    public const REFEREE_ITEM_DATA = '{"id":37,"sport_id":1,"country_id":null,"city_id":null,"common_name":"Craig Alexander Thomson","firstname":null,"lastname":null,"name":"Craig Alexander Thomson","display_name":"Craig Alexander Thomson","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/placeholder.png","height":null,"weight":null,"date_of_birth":null,"gender":null}';
    public const REFEREE_COLLECTION_DATA = '[{"id":37,"sport_id":1,"country_id":null,"city_id":null,"common_name":"Craig Alexander Thomson","firstname":null,"lastname":null,"name":"Craig Alexander Thomson","display_name":"Craig Alexander Thomson","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/placeholder.png","height":null,"weight":null,"date_of_birth":null,"gender":null},{"id":94,"sport_id":1,"country_id":null,"city_id":null,"common_name":"Robert Madden","firstname":null,"lastname":null,"name":"Robert Madden","display_name":"Robert Madden","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/placeholder.png","height":null,"weight":null,"date_of_birth":null,"gender":null}]';

    public const RIVAL_COLLECTION_DATA = '[{"sport_id":1,"team_id":2706,"rival_id":1020,"id":1},{"sport_id":1,"team_id":290,"rival_id":393,"id":2}]';

    public const ROUND_ITEM_DATA = '{"id":23317,"sport_id":1,"league_id":271,"season_id":1273,"stage_id":1086,"name":"1","finished":true,"is_current":false,"starting_at":"2005-07-19","ending_at":"2005-07-24","games_in_current_week":false}';
    public const ROUND_COLLECTION_DATA = '[{"id":23317,"sport_id":1,"league_id":271,"season_id":1273,"stage_id":1086,"name":"1","finished":true,"is_current":false,"starting_at":"2005-07-19","ending_at":"2005-07-24","games_in_current_week":false},{"id":23318,"sport_id":1,"league_id":271,"season_id":1273,"stage_id":1086,"name":"2","finished":true,"is_current":false,"starting_at":"2005-07-24","ending_at":"2005-07-31","games_in_current_week":false}]';

    public const MARKET_ITEM_DATA = '{"id":1,"legacy_id":1,"name":"Fulltime Result","developer_name":"FULLTIME_RESULT","has_winning_calculations":true}';
    public const MARKET_COLLECTION_DATA = '[{"id":1,"legacy_id":1,"name":"Fulltime Result","developer_name":"FULLTIME_RESULT","has_winning_calculations":true},{"id":2,"legacy_id":63,"name":"Double Chance","developer_name":"DOUBLE_CHANCE","has_winning_calculations":false}]';

    public const ODD_COLLECTION_DATA = '[{"id":1,"fixture_id":18533878,"market_id":1,"bookmaker_id":34,"label":"Home","value":"1.48","name":"Home","sort_order":null,"market_description":"Match Winner","probability":"67.57%","dp3":"1.480","fractional":"37\/25","american":"-209","winning":false,"stopped":false,"total":null,"handicap":null,"participants":null,"created_at":"2023-01-11T14:40:25.000000Z","updated_at":"2023-01-11T14:47:50.000000Z","original_label":null,"latest_bookmaker_update":"2023-01-11 14:40:25"},{"id":2,"fixture_id":18533878,"market_id":80,"bookmaker_id":34,"label":"Over","value":"1.85","name":"Over","sort_order":null,"market_description":"Goals Over\/Under","probability":"54.05%","dp3":"1.850","fractional":"37\/20","american":"-118","winning":false,"stopped":false,"total":"2.75","handicap":null,"participants":null,"created_at":"2023-01-11T14:40:25.000000Z","updated_at":"2023-01-11T14:43:44.000000Z","original_label":null,"latest_bookmaker_update":"2023-01-11 14:40:25"}]';

    public const SEASON_ITEM_DATA = '{"id":759,"sport_id":1,"league_id":271,"tie_breaker_rule_id":169,"name":"2016\/2017","finished":true,"pending":false,"is_current":false,"starting_at":"2016-07-15","ending_at":"2017-06-01","standings_recalculated_at":"2023-05-24 08:38:01","games_in_current_week":false}';
    public const SEASON_COLLECTION_DATA = '[{"id":759,"sport_id":1,"league_id":271,"tie_breaker_rule_id":169,"name":"2016\/2017","finished":true,"pending":false,"is_current":false,"starting_at":"2016-07-15","ending_at":"2017-06-01","standings_recalculated_at":"2023-05-24 08:38:01","games_in_current_week":false},{"id":819,"sport_id":1,"league_id":513,"tie_breaker_rule_id":169,"name":"2015\/2016","finished":true,"pending":false,"is_current":false,"starting_at":"2016-05-04","ending_at":"2016-05-22","standings_recalculated_at":"2022-09-27 08:13:05.900028","games_in_current_week":false}]';

    public const STAGE_ITEM_DATA = '{"id":1086,"sport_id":1,"league_id":271,"season_id":1273,"type_id":223,"name":"Regular Season","sort_order":1,"finished":true,"is_current":false,"starting_at":"2005-07-19","ending_at":"2006-05-14","games_in_current_week":false,"tie_breaker_rule_id":null}';
    public const STAGE_COLLECTION_DATA = '[{"id":1086,"sport_id":1,"league_id":271,"season_id":1273,"type_id":223,"name":"Regular Season","sort_order":1,"finished":true,"is_current":false,"starting_at":"2005-07-19","ending_at":"2006-05-14","games_in_current_week":false,"tie_breaker_rule_id":null},{"id":1087,"sport_id":1,"league_id":271,"season_id":1274,"type_id":223,"name":"Regular Season","sort_order":1,"finished":true,"is_current":false,"starting_at":"2006-07-19","ending_at":"2007-05-27","games_in_current_week":false,"tie_breaker_rule_id":null}]';

    public const STATE_ITEM_DATA = '{"id":1,"state":"NS","name":"Not Started","short_name":"NS","developer_name":"NS"}';
    public const STATE_COLLECTION_DATA = '[{"id":1,"state":"NS","name":"Not Started","short_name":"NS","developer_name":"NS"},{"id":2,"state":"INPLAY_1ST_HALF","name":"1st Half","short_name":"1st","developer_name":"INPLAY_1ST_HALF"}]';

    public const TEAM_ITEM_DATA = '{"id":53,"sport_id":1,"country_id":1161,"venue_id":8909,"gender":"male","name":"Celtic","short_code":"CEL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/teams\/21\/53.png","founded":1888,"type":"domestic","placeholder":false,"last_played_at":"2023-09-30 11:30:00"}';
    public const TEAM_COLLECTION_DATA = '[{"id":53,"sport_id":1,"country_id":1161,"venue_id":8909,"gender":"male","name":"Celtic","short_code":"CEL","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/teams\/21\/53.png","founded":1888,"type":"domestic","placeholder":false,"last_played_at":"2023-09-30 11:30:00"},{"id":62,"sport_id":1,"country_id":1161,"venue_id":8914,"gender":"male","name":"Rangers","short_code":"RAN","image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/teams\/30\/62.png","founded":1873,"type":"domestic","placeholder":false,"last_played_at":"2023-09-30 14:00:00"}]';

    public const TEAM_SQUAD_COLLECTION_DATA = '[{"id":741301,"transfer_id":233006,"player_id":8056287,"team_id":53,"position_id":25,"detailed_position_id":148,"start":"2023-07-26","end":"2028-05-31","captain":false,"jersey_number":17},{"id":762227,"transfer_id":234932,"player_id":3533334,"team_id":53,"position_id":25,"detailed_position_id":148,"start":"2023-08-16","end":"2028-05-31","captain":false,"jersey_number":4}]';

    public const TRANSFER_ITEM_DATA = '{"id":1,"sport_id":1,"player_id":35659846,"type_id":219,"from_team_id":148048,"to_team_id":3736,"position_id":25,"detailed_position_id":154,"date":"2021-12-27","career_ended":false,"completed":true,"amount":909000}';
    public const TRANSFER_COLLECTION_DATA = '[{"id":1,"sport_id":1,"player_id":35659846,"type_id":219,"from_team_id":148048,"to_team_id":3736,"position_id":25,"detailed_position_id":154,"date":"2021-12-27","career_ended":false,"completed":true,"amount":909000},{"id":2,"sport_id":1,"player_id":320984,"type_id":218,"from_team_id":904,"to_team_id":3901,"position_id":26,"detailed_position_id":153,"date":"2021-12-27","career_ended":false,"completed":true,"amount":null}]';

    public const TV_STATION_ITEM_DATA = '{"id":33,"name":"Star+","url":"https:\/\/www.starplus.com\/","image_path":"https:\/\/cdn.sportmonks.com\/images\/core\/tvstations\/1\/33.png","type":"tv","related_id":null}';
    public const TV_STATION_COLLECTION_DATA = '[{"id":33,"name":"Star+","url":"https:\/\/www.starplus.com\/","image_path":"https:\/\/cdn.sportmonks.com\/images\/core\/tvstations\/1\/33.png","type":"tv","related_id":null},{"id":34,"name":"Viaplay","url":"https:\/\/www.viaplay.com","image_path":"https:\/\/cdn.sportmonks.com\/images\/core\/tvstations\/2\/34.png","type":"tv","related_id":null}]';

    public const TYPE_ITEM_DATA = '{"id":1,"name":"1st Half","code":"1st-half","developer_name":"1ST_HALF","model_type":"period","stat_group":null}';
    public const TYPE_COLLECTION_DATA = '[{"id":1,"name":"1st Half","code":"1st-half","developer_name":"1ST_HALF","model_type":"period","stat_group":null},{"id":2,"name":"2nd Half","code":"2nd-half","developer_name":"2ND_HALF","model_type":"period","stat_group":null}]';

    public const TYPE_ENTITY_COLLECTION_DATA = '{"CoachStatisticDetail":{"updated_at":"2023-09-21T16:20:39.000000Z","types":[{"id":59,"name":"Substitutions","code":"substitutions","developer_name":"SUBSTITUTIONS","model_type":"statistic","stat_group":"overall"},{"id":83,"name":"Redcards","code":"redcards","developer_name":"REDCARDS","model_type":"statistic","stat_group":"overall"}]},"Event":{"updated_at":"2023-09-21T16:20:40.000000Z","types":[{"id":10,"name":"VAR","code":"VAR","developer_name":"VAR","model_type":"event","stat_group":null},{"id":14,"name":"Goal","code":"goal","developer_name":"GOAL","model_type":"event","stat_group":null}]}}';

    public const VENUE_ITEM_DATA = '{"id":73,"country_id":1004,"city_id":66569,"name":"The Paisley 2021 Stadium","address":"Greenhill Road","zipcode":null,"latitude":"53.4139488","longitude":"-113.559332","capacity":8023,"image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/venues\/9\/73.png","city_name":"Paisley","surface":"grass","national_team":false}';
    public const VENUE_COLLECTION_DATA = '[{"id":73,"country_id":1004,"city_id":66569,"name":"The Paisley 2021 Stadium","address":"Greenhill Road","zipcode":null,"latitude":"53.4139488","longitude":"-113.559332","capacity":8023,"image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/venues\/9\/73.png","city_name":"Paisley","surface":"grass","national_team":false},{"id":219,"country_id":98,"city_id":68322,"name":"McDiarmid Park","address":"Crieff Road","zipcode":null,"latitude":"-31.9558964","longitude":"115.8605801","capacity":10696,"image_path":"https:\/\/cdn.sportmonks.com\/images\/soccer\/venues\/27\/219.png","city_name":"Perth","surface":"grass","national_team":false}]';

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