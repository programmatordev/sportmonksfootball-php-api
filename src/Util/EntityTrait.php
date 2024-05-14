<?php

namespace ProgrammatorDev\SportMonksFootball\Util;

trait EntityTrait
{
    private function createEntityCollection(string $entityClass, array $list, ?string $timezone = null): array
    {
        return \array_map(function(array $data, int|string $key) use ($entityClass, $timezone) {
            // "_key" index is injected in data to get the key from an associative array response
            $data['_key'] = $key;
            return new $entityClass($data, $timezone);
        }, $list, \array_keys($list));
    }
}