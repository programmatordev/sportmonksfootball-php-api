<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use ProgrammatorDev\YetAnotherPhpValidator\Validator;
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
            'httpClientBuilder' => new HttpClientBuilder()
        ]);

        $resolver->setRequired('applicationKey');

        $resolver->setAllowedTypes('applicationKey', 'string');
        $resolver->setAllowedTypes('httpClientBuilder', HttpClientBuilder::class);

        $resolver->setAllowedValues('applicationKey', function($value) {
            return !empty($value);
        });

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
}