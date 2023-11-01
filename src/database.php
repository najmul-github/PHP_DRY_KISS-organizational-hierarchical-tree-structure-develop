<?php

namespace Organogram;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \MySQLi(env('DB_HOST', 'localhost'), env('DB_USER', 'dbuser'), env('DB_PASSWORD', 'password'), env('DB_NAME', 'dbname'));

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function fetch($result)
    {
        $data = $result->fetch_assoc();
        $result->free_result();
        return $data;
    }

    public function fetchAll($result)
    {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        return $data;
    }

    public function close()
    {
        $this->connection->close();
    }
}

?>