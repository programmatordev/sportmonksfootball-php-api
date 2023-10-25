<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait CreateEntityCollectionTrait
{
    private function createEntityCollection(string $entityClass, array $data, ?string $timezone = null): array
    {
        return \array_map(function(array $value, int|string $key) use ($entityClass, $timezone) {
            // "_key" index is injected in data to get the key from an associative array response
            $value['_key'] = $key;
            return new $entityClass($value, $timezone);
        }, $data, \array_keys($data));
    }
}