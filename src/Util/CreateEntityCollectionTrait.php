<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait CreateEntityCollectionTrait
{
    private function createEntityCollection(string $entityClass, array $data): array
    {
        return \array_map(function(array $value, int|string $key) use ($entityClass) {
            return new $entityClass($value, $key);
        }, $data, \array_keys($data));
    }
}