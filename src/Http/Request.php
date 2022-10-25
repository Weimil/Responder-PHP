<?php

namespace Responder\Http;

class Request
{
    protected string $uri;

    protected HttpMethod $httpMethod;

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getHttpMethod(): HttpMethod
    {
        return $this->httpMethod;
    }

    public function setHttpMethod(HttpMethod $httpMethod): void
    {
        $this->httpMethod = $httpMethod;
    }
}
