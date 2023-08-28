<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

class MockResponse
{
    public const ABSTRACT_RESPONSE = '{"data":[],"pagination":{"count":7,"per_page":50,"current_page":1,"next_page":null,"has_more":false},"subscription":[{"meta":[],"plans":[{"plan":"Football Free Plan","sport":"Football","category":"Standard"},{"plan":"Cricket Free Plan","sport":"Cricket","category":"Standard"}],"add_ons":[],"widgets":[]}],"rate_limit":{"resets_in_seconds":3600,"remaining":2999,"requested_entity":"Continent"},"timezone":"UTC"}';
}