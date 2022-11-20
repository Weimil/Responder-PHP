<?php

namespace Responder\Database\Driver;

interface DatabaseDriver
{
    public function connect(
        string $driver,
        string $host,
        int    $port,
        string $database,
        string $username,
        string $password
    );
    
    public function close(): void;
    
    public function statement(string $query, array $values = []): array|bool;
}
