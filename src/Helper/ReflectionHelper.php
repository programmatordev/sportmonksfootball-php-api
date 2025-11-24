<?php

namespace ProgrammatorDev\SportMonksFootball\Helper;

class ReflectionHelper
{
    public static function getClassConstants(string $className): array
    {
        $reflection = new \ReflectionClass($className);
        $constants = $reflection->getConstants();

        // sort by alphabetical order
        // to be more intuitive when listing values for error messages
        asort($constants);

        return $constants;
    }
}