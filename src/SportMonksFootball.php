<?php

namespace ProgrammatorDev\SportMonksFootball;

class SportMonksFootball
{
    public function __construct(
        private readonly Config $config
    ) {}

    public function getConfig(): Config
    {
        return $this->config;
    }
}