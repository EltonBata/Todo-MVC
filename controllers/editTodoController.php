<?php
session_start();

require_once '../models/Todo.php';

$todo = new Todo();

if ($_SERVER['REQUEST'] = 'POST') {

    $id = $_POST['id'];
    $label = $_POST['label'];

    $date = strtotime($_POST['date']);
    $params = [
        $_POST['title'],
        $_POST['description'],
        date('Y-m-d', $date),
        $_POST['label']
    ];

    if ($todo->editTodo($id, $params)) {

        $_SESSION['msg'] = 'Todo Updated';
        header("location: ../views/todo.php?label=$label");
    } else {
        $_SESSION['erro'] = 'Error on Update';
        header("location: ../views/todo.php?label=$label");
    }
}
