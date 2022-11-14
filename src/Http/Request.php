<?php

namespace Responder\Http;

class Request
{
    protected string $uri;

    protected HttpMethod $httpMethod;

    protected array $headers = [];
    
    protected array $body = [];

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

    public function getHeaders(): array
    {
        return $this->headers;
    }
    
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }
    
    public function getBody(): array
    {
        return $this->body;
    }
    
    public function setBody(array $body): void
    {
        $this->body = $body;
    }
}
