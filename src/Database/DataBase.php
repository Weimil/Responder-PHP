<?php

namespace Responder\Database;

use PDO;
use PDOException;

class DataBase implements DatabaseDriver
{
    const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    
    public function connect(string $protocol, string $host, int $port, string $database, string $username, string $password, array $options)
    {
        try {
            $dsn = "$protocol:host=$host;port=$port;dbname=$database";
            
            return new PDO(
                $dsn,
                $username,
                $password,
                $options
            );
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
    
    public function close(): void
    {
        // TODO: Implement close() method.
    }
    
    public function statement(string $query, array $bind = []): array|bool
    {
        // TODO: Implement statement() method.
    }
}