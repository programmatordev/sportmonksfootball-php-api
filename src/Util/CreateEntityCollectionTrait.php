<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait CreateEntityCollectionTrait
{
    private function createEntityCollection(string $entityClass, array $data): array
    {
        return \array_map(function(array $dataValue, int|string $dataKey) use ($entityClass) {
            return new $entityClass($dataValue, $dataKey);
        }, $data, \array_keys($data));
    }
}