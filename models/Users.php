<?php
include_once '../config/db.php';

class Users
{
    public $link;

    function __construct()
    {
        $db_connection = new db();

        $this->link = $db_connection->connect();
        return $this->link;
    }

    public function addUser($params = [])
    {

        $sql = $this->link->prepare("INSERT INTO users (username, password, date, time, email, user_status) VALUES (?,?,?,?,?,?)");
        $sql->execute($params);
        $count = $sql->rowCount();

        return $count;
    }

    public function login($username, $password)
    {

        $sql = $this->link->prepare("SELECT * FROM users WHERE username = '$username'");
        $sql->execute();
        $dados = $sql->fetch();
        $count = $sql->rowCount();

        if ($count > 0) {

            if (password_verify($password, $dados['password'])) {
                return true;
            }
        }

        return false;
    }

    public function verifyUser($username)
    {

        $sql = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $sql->execute();
        $count = $sql->rowCount();

        return $count;
    }

    public function getUserInfo($id)
    {

        $sql = $this->link->query("SELECT * FROM users WHERE username = '$id'");
        $sql->execute();
        $count = $sql->rowCount();

        if ($count == 1) {
            $dados = $sql->fetch();
            return $dados;
        }
    }
}
