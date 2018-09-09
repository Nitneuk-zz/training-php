<?php

declare(strict_types=1);

namespace App;

class DataProvider
{
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
        try {
            $this->connection = new \PDO(
                \sprintf('mysql:host=%s;dbname=%s', $this->host, $this->password),
                $this->login,
                $this->password
            );
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function executeQuery(string $sql)
    {

    }
}