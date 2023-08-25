<?php

namespace ProgrammatorDev\SportMonksFootball\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class HttpClientBuilder
{
    private array $plugins = [];

    public function __construct(
        private ?ClientInterface $client = null,
        private ?RequestFactoryInterface $requestFactory = null,
        private ?StreamFactoryInterface $streamFactory = null
    )
    {
        $this->client ??= Psr18ClientDiscovery::find();
        $this->requestFactory ??= Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory ??= Psr17FactoryDiscovery::findStreamFactory();
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->plugins[$plugin::class] = $plugin;
    }

    public function getPlugin(string $className): Plugin
    {
        return $this->plugins[$className];
    }

    public function getHttpClient(): HttpMethodsClient
    {
        $this->addPlugin(new HeaderDefaultsPlugin([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]));

        $pluginClientFactory = new PluginClientFactory();
        $client = $pluginClientFactory->createClient($this->client, $this->plugins);

        return new HttpMethodsClient(
            $client,
            $this->requestFactory,
            $this->streamFactory
        );
    }

    public function getRequestFactory(): ?RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    public function getStreamFactory(): ?StreamFactoryInterface
    {
        return $this->streamFactory;
    }
}