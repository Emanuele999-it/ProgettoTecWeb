<?php

class DBConnection
{
    private $host = "localhost";
    private $username;
    private $password;
    private $connection;

    public function __construct()
    {
        $this->username = file_get_contents(__DIR__ . "/username.txt");
        $this->password = file_get_contents(__DIR__ . "/password.txt");

        $this->connectTo(file_get_contents(__DIR__ . "/dbname.txt"));
    }

    public function connectTo(string $database)
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $database);

        if (!$this->connection) {
            throw new RuntimeException("Couldn't connect to database");
        }
    }

    public function disconnect()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function query($query)
    {
        return $this->connection->query($query);
    }

}
