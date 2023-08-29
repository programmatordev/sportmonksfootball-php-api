<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Config
{
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
            'cache' => null
        ]);

        $resolver->setRequired('applicationKey');

        $resolver->setAllowedTypes('applicationKey', 'string');
        $resolver->setAllowedTypes('httpClientBuilder', HttpClientBuilder::class);
        $resolver->setAllowedTypes('cache', ['null', CacheItemPoolInterface::class]);

        $resolver->setAllowedValues('applicationKey', fn($value) => !empty($value));

        return $resolver->resolve($options);
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
}