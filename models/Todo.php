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

    public function listTodo($username, $label)
    {
        $sql = $this->link->query("SELECT * FROM my_todo WHERE username = '$username' AND label = '$label' ORDER BY id DESC");

        if ($label == null) {
            $sql = $this->link->query("SELECT * FROM my_todo WHERE username = '$username' ORDER BY id DESC");
        } else {
            $sql = $this->link->query("SELECT * FROM my_todo WHERE username = '$username' AND label = '$label' ORDER BY id DESC");
        }

        $sql->execute();
        $dados = $sql->fetchAll(PDO::FETCH_OBJ);

        return $dados;
    }

    public function listTodoId($id){
        $sql = $this->link->query("SELECT * FROM my_todo WHERE id = '$id' LIMIT 1");
        $sql->execute();

        $dados = $sql->fetch(PDO::FETCH_OBJ);

        return $dados;
    }

    public function countTodo($params)
    {
        $sql = $this->link->query("SELECT  COUNT(*) AS total FROM my_todo WHERE username = ? AND status = ?");
        $sql->execute($params);
        $count = $sql->fetchAll(PDO::FETCH_OBJ);

        return $count;
    }

    public function editTodo($id, $params = [])
    {

        $sql = $this->link->prepare("UPDATE my_todo SET title = ?, description = ?, due_date = ?, label = ?  WHERE id = '$id'");
        $sql->execute($params);

        $count = $sql->rowCount();
    }

    public function deleteTodo($id)
    {
        $sql = $this->link->prepare("DELETE FROM my_todo WHERE id = '$id'");
        $sql->execute();
        $count = $sql->rowCount();

        return $count;
    }
}
