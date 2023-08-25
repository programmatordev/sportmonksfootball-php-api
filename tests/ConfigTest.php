<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;

class ConfigTest extends AbstractTest
{
    private Config $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = new Config([
            'applicationKey' => self::APPLICATION_KEY
        ]);
    }

    public function testConfigDefaultOptions()
    {
        $this->assertSame(self::APPLICATION_KEY, $this->config->getApplicationKey());
        $this->assertInstanceOf(HttpClientBuilder::class, $this->config->getHttpClientBuilder());
    }

    public function testConfigWithOptions()
    {
        $config = new Config([
            'applicationKey' => 'newtestappkey',
            'httpClientBuilder' => new HttpClientBuilder()
        ]);

        $this->assertSame('newtestappkey', $config->getApplicationKey());
        $this->assertInstanceOf(HttpClientBuilder::class, $config->getHttpClientBuilder());
    }

    #[DataProvider('provideInvalidConfigOptionsData')]
    public function testConfigWithInvalidOptions(array $options, string $expectedException)
    {
        $this->expectException($expectedException);

        new Config($options);
    }

    public static function provideInvalidConfigOptionsData(): \Generator
    {
        yield 'missing application key' => [
            [],
            MissingOptionsException::class
        ];
        yield 'empty application key' => [
            ['applicationKey' => ''],
            InvalidOptionsException::class
        ];
    }

    public function testConfigSetApplicationKey()
    {
        $this->config->setApplicationKey('newtestappkey');
        $this->assertSame('newtestappkey', $this->config->getApplicationKey());
    }

    public function testConfigSetApplicationKeyWithBlankValue()
    {
        $this->expectException(ValidationException::class);
        $this->config->setApplicationKey('');
    }

    public function testConfigSetHttpClientBuilder()
    {
        $this->config->setHttpClientBuilder(new HttpClientBuilder());
        $this->assertInstanceOf(HttpClientBuilder::class, $this->config->getHttpClientBuilder());
    }
}