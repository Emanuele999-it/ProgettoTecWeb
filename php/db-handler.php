<?php

class DBConnection
{
    private $host = "localhost";
    private $username;
    private $password;
    private $connection;

    public function __construct()
    {
        $this->username = "siteuser";
        $this->password = "IloveDS";

        $this->connectTo("test2");
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
