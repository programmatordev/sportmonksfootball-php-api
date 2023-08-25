<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Http\Mock\Client;
use PHPUnit\Framework\TestCase;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;

class AbstractTest extends TestCase
{
    protected const APPLICATION_KEY = 'testappkey';

    protected Client $mockHttpClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockHttpClient = new Client();
    }

    protected function givenApi(): SportMonksFootball
    {
        return new SportMonksFootball(
            new Config([
                'applicationKey' => self::APPLICATION_KEY,
                'httpClientBuilder' => new HttpClientBuilder($this->mockHttpClient)
            ])
        );
    }
}