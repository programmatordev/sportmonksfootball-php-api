<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

class Error extends AbstractResponse
{
    private string $message;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->message = $response['message'];
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}