<?php

namespace Responder\Http;

class Request
{
    protected string $uri;

    protected HttpMethod $httpMethod;

    protected array $headers = [];
    
    protected array $bodyData = [];
    
    protected array $queryParameters = [];

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
    
    public function getBodyData(): array
    {
        return $this->bodyData;
    }
    
    public function setBodyData(array $bodyData): void
    {
        $this->bodyData = $bodyData;
    }
    
    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }
    
    public function setQueryParameters(array $queryParameters): void
    {
        $this->queryParameters = $queryParameters;
    }
}
