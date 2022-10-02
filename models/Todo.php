<?php
require_once '../config/db.php';

class Todo
{
    public $link;

    function __construct()
    {
        $db_connection = new db();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    public function createTodo($params = [])
    {
        $sql = $this->link->prepare("INSERT INTO my_todo (username, title, description, due_date, created_date, label) VALUES (?,?,?,?,?,?)");
        $sql->execute($params);
        $count = $sql->rowCount();

        return $count;
    }

    public function listTodo($params = [])
    {
        $sql = $this->link->query("SELECT * FROM todo WHERE username = ? AND status = ?");
        $sql->execute($params);
        $dados = $sql->fetchAll(PDO::FETCH_OBJ);

        return $dados;
    }

    public function countTodo($params)
    {
        $sql = $this->link->query("SELECT  COUNT(*) AS total FROM todo WHERE username = ? AND status = ?");
        $sql->execute($params);
        $count = $sql->fetchAll(PDO::FETCH_OBJ);

        return $count;
    }

    public function editTodo($params = [], $data = [])
    {
        $x=0;
        foreach ($data as $key => $value) {
            $sql = $this->link->prepare("UPDATE todo SET $key = $value WHERE username = ? AND id = ?");
            $sql->execute($params);
            $x++;
        }

        return $x;
    }

    public function deleteTodo($params = []){
        $sql = $this->link->prepare("DELETE FROM todo WHERE username = ? AND status = ?");
        $sql->execute($params);
        $count = $sql->rowCount();

        return $count;
    }
}
