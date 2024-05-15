<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Http\Mock\Client;
use PHPUnit\Framework\TestCase;
use ProgrammatorDev\Api\Builder\ClientBuilder;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

class AbstractTest extends TestCase
{
    protected const API_KEY = 'testapikey';

    protected SportMonksFootball $api;

    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();

        $this->api = new SportMonksFootball(self::API_KEY);
        $this->api->setClientBuilder(new ClientBuilder($this->mockClient));
    }
}