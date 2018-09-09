<?php

declare(strict_types=1);

namespace App;

class DataProvider
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(string $host, string $login, string $password, string $databaseName = null)
    {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    public function connect()
    {
        $this->connection = new \PDO(
            \sprintf('mysql:host=%s;dbname=%s', $this->host, $this->databaseName),
            $this->login,
            $this->password,
            [\PDO::ATTR_PERSISTENT => true]
        );
    }

    public function disconnect()
    {
        $this->connection = null;
    }

    /**
     * @throws \Exception
     */
    public function executeQuery(string $sql)
    {
        if (null === $this->connection) {
            throw new \Exception('You must connect before executing query');
        }

        if (!$result = $this->connection->query($sql)) {
            throw new \Exception(
                \sprintf('Unable to perform query : %d "%s"', $this->connection->errorCode(), $this->connection->errorInfo())
            );
        }

        return $result;
    }
}