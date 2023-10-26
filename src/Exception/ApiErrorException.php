<?php

namespace ProgrammatorDev\SportMonksFootball\Exception;

class ApiErrorException extends \Exception
{
    private ?string $link;

    public function __construct(string $message, int $code = 0, ?string $link = null)
    {
        parent::__construct($message, $code);

        $this->link = $link;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }
}