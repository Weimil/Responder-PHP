<?php

namespace Responder\Http;

class Response
{
    protected int $status = 200;
    
    protected array $headers = [];
    
    protected ?string $content = null;
    
    public static function json(array $data): self
    {
        $response = new Response();

        $response->setContentType("application/json");
        $response->setContent(json_encode($data));
        
        return $response;
    }
    
    public function setContentType(string $value): void
    {
        $this->setHeader("Content-Type", $value);
    }
    
    public static function text(string $text): self
    {
        $response = new Response();
        
        $response->setContentType("text/plain");
        $response->setContent($text);
        
        return $response;
    }
    
    public static function error(string $text): self
    {
        $response = self::text($text);
    
        $response->setStatus(404);
        
        return $response;
    }
    
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
    
    public function getContent(): ?string
    {
        return $this->content;
    }
    
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    
    public function prepare(): void
    {
//        $this->setHeader("Content-Length", strlen($this->content));
        
        http_response_code($this->status);
        
        foreach ($this->headers as $header => $value) {
            header("$header: $value");
        }
    }
    
    public function removeHeader(string $header): void
    {
        unset($this->headers[strtolower($header)]);
    }
    
    public function setHeader(string $header, string $value): void
    {
        $this->headers[strtolower($header)] = $value;
    }
}
