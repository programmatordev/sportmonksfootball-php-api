<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Config
{
    private string $baseUrl = 'https://api.sportmonks.com';

    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = $this->resolveOptions($options);
    }

    private function resolveOptions(array $options): array
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults([
            'httpClientBuilder' => new HttpClientBuilder(),
            'cache' => null,
            'logger' => null
        ]);

        $resolver->setRequired('applicationKey');

        $resolver->setAllowedTypes('applicationKey', 'string');
        $resolver->setAllowedTypes('httpClientBuilder', HttpClientBuilder::class);
        $resolver->setAllowedTypes('cache', ['null', CacheItemPoolInterface::class]);
        $resolver->setAllowedTypes('logger', ['null', LoggerInterface::class]);

        $resolver->setAllowedValues('applicationKey', fn($value) => !empty($value));

        return $resolver->resolve($options);
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getApplicationKey(): string
    {
        return $this->options['applicationKey'];
    }

    /**
     * @throws ValidationException
     */
    public function setApplicationKey(string $applicationKey): self
    {
        Validator::notBlank()->assert($applicationKey, 'applicationKey');

        $this->options['applicationKey'] = $applicationKey;

        return $this;
    }

    public function getHttpClientBuilder(): HttpClientBuilder
    {
        return $this->options['httpClientBuilder'];
    }

    public function setHttpClientBuilder(HttpClientBuilder $httpClientBuilder): self
    {
        $this->options['httpClientBuilder'] = $httpClientBuilder;

        return $this;
    }

    public function getCache(): ?CacheItemPoolInterface
    {
        return $this->options['cache'];
    }

    public function setCache(?CacheItemPoolInterface $cache): self
    {
        $this->options['cache'] = $cache;

        return $this;
    }

    public function getLogger(): ?LoggerInterface
    {
        return $this->options['logger'];
    }

    public function setLogger(?LoggerInterface $logger): self
    {
        $this->options['logger'] = $logger;

        return $this;
    }
}