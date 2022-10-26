<?php

namespace Responder\Http;

use Responder\Routing\Route;

class Request
{
    protected string $uri;

    protected HttpMethod $httpMethod;

    protected Route $route;

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

    public function getRoute(): Route
    {
        return $this->route;
    }

    public function setRoute(Route $route): void
    {
        $this->route = $route;
    }
}
