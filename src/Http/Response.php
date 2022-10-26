<?php

namespace Responder\Http;

class Response
{
    protected int $status = 200;

    protected array $headers = [];

    protected ?string $content = null;

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getHeaders(string $key = null): array|string|null
    {
        if (is_null($key)) {
            return $this->headers;
        }

        return $this->headers[strtolower($key)] ?? null;
    }

    public function setHeader(string $header, string $value)
    {
        $this->headers[strtolower($header)] = $value;
    }

    public function removeHeader(string $header): void
    {
        unset($this->headers[strtolower($header)]);
    }

    public function setContentType(string $value)
    {
        $this->setHeader("Content-Type", $value);
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function prepare()
    {
        if (is_null($this->content)) {
            $this->removeHeader("Content-Type");
            $this->removeHeader("Content-Length");
        } else {
            $this->setHeader("Content-Length", strlen($this->content));
        }
    }

    public static function json(array $data): self
    {
        $response = new Response();

        $response->setContentType("application/json");
        $response->setContent(json_encode($data));

        return $response;
    }

    public static function text(string $text): self
    {
        $response = new Response();

        $response->setContentType("text/plain");
        $response->setContent($text);

        return $response;
    }
}
