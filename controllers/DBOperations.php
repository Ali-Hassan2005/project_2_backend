<?php

class DBOperations
{
    private $connection;    

    private function createConnection()
    {
        $this->connection = mysqli_connect("127.0.0.1", "root", "", "project");
    }

    protected function connect($sql)
    {
        $this->createConnection();

        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

}
