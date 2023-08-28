<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait CreateEntityCollectionTrait
{
    private function createEntityCollection(array $data, string $entityClass): array
    {
        return \array_map(function(array $entityData) use ($entityClass) {
            return new $entityClass($entityData);
        }, $data);
    }
}