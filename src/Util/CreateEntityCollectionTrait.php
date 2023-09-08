<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait CreateEntityCollectionTrait
{
    private function createEntityCollection(string $entityClass, array $data): array
    {
        return \array_map(function(array $entityData) use ($entityClass) {
            return new $entityClass($entityData);
        }, $data);
    }
}