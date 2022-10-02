<?php

class db
{

    protected $con;
    public $user = "root";
    public $password = "";
    public $db_name = "todo";
    public $host = "localhost";

    function connect()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
            return $this->con;
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }
}
