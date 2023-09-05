<?php

class DBOperations
{
    private $connection;
    private static $instance; 
    
    public function __construct()
    {
        $this->connection = mysqli_connect("127.0.0.1", "root", "", "project");
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DBOperations();
        }
        return self::$instance;
    }

    protected function connect($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
}
