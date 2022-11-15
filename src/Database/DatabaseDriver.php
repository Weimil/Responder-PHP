<?php

namespace Responder\Database;

interface DatabaseDriver {
    public function connect(
        string $protocol,
        string $host,
        int $port,
        string $database,
        string $username,
        string $password,
        array $options
    );
    
    public function close(): void;
    
    public function statement(string $query, array $bind = []): array|bool;
}
