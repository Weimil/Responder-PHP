<?php

namespace Responder\Database\Driver;

use PDO;
use PDOException;

class PdoDriver implements DatabaseDriver
{
    protected PDO $pdo;
    
    public function connect(string $driver, string $host, int $port, string $database, string $username, string $password)
    {
        try {
            $dsn = "$driver:host=$host;port=$port;dbname=$database";
            
            $this->pdo = new PDO(
                $dsn,
                $username,
                $password
            );
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
    
    public function close(): void
    {
        remove(DatabaseDriver::class);
    }
    
    public function statement(string $query, array $bind = []): array|bool
    {
        $statement = $this->pdo->prepare($query);
        
        $statement->execute($bind);
    
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}