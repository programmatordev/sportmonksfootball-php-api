<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\Test\DataProvider\InvalidValueDataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
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
        $this->assertSame('UTC', $this->config->getTimezone());
        $this->assertSame('en', $this->config->getLanguage());
        $this->assertInstanceOf(HttpClientBuilder::class, $this->config->getHttpClientBuilder());
        $this->assertSame(null, $this->config->getCache());
        $this->assertSame(null, $this->config->getLogger());
    }

    public function testConfigWithOptions()
    {
        $config = new Config([
            'applicationKey' => 'newtestappkey',
            'timezone' => 'Europe/Lisbon',
            'language' => 'ja',
            'httpClientBuilder' => new HttpClientBuilder(),
            'cache' => $this->createMock(CacheItemPoolInterface::class),
            'logger' => $this->createMock(LoggerInterface::class)
        ]);

        $this->assertSame('newtestappkey', $config->getApplicationKey());
        $this->assertSame('Europe/Lisbon', $config->getTimezone());
        $this->assertSame('ja', $config->getLanguage());
        $this->assertInstanceOf(HttpClientBuilder::class, $config->getHttpClientBuilder());
        $this->assertInstanceOf(CacheItemPoolInterface::class, $config->getCache());
        $this->assertInstanceOf(LoggerInterface::class, $config->getLogger());
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
        yield 'invalid timezone' => [
            ['applicationKey' => self::APPLICATION_KEY, 'timezone' => 'Invalid/Timezone'],
            InvalidOptionsException::class
        ];
        yield 'invalid language' => [
            ['applicationKey' => self::APPLICATION_KEY, 'language' => 'invalid'],
            InvalidOptionsException::class
        ];
    }

    public function testConfigSetApplicationKey()
    {
        $this->config->setApplicationKey('newtestappkey');
        $this->assertSame('newtestappkey', $this->config->getApplicationKey());
    }

    #[DataProvider('provideInvalidApplicationKeyData')]
    public function testConfigSetApplicationKeyWithInvalidValue(string $applicationKey, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->config->setApplicationKey($applicationKey);
    }

    public static function provideInvalidApplicationKeyData(): \Generator
    {
        yield 'empty application key' => ['', ValidationException::class];
    }

    public function testConfigSetTimezone()
    {
        $this->config->setTimezone('Europe/Lisbon');
        $this->assertSame('Europe/Lisbon', $this->config->getTimezone());
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidTimezoneData')]
    public function testConfigSetTimezoneWithInvalidValue(string $timezone, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->config->setTimezone($timezone);
    }

    public function testConfigSetLanguage()
    {
        $this->config->setLanguage('ja');
        $this->assertSame('ja', $this->config->getLanguage());
    }

    #[DataProviderExternal(InvalidValueDataProvider::class, 'provideInvalidLanguageData')]
    public function testConfigSetLanguageWithInvalidValue(string $language, string $expectedException)
    {
        $this->expectException($expectedException);
        $this->config->setLanguage($language);
    }

    public function testConfigSetHttpClientBuilder()
    {
        $this->config->setHttpClientBuilder(new HttpClientBuilder());
        $this->assertInstanceOf(HttpClientBuilder::class, $this->config->getHttpClientBuilder());
    }

    public function testConfigSetCache()
    {
        $this->config->setCache($this->createMock(CacheItemPoolInterface::class));
        $this->assertInstanceOf(CacheItemPoolInterface::class, $this->config->getCache());
    }

    public function testConfigSetLogger()
    {
        $this->config->setLogger($this->createMock(LoggerInterface::class));
        $this->assertInstanceOf(LoggerInterface::class, $this->config->getLogger());
    }
}