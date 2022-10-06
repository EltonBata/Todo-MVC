<?php
session_start();
require_once '../models/Todo.php';

$todo = new Todo();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $label = $_GET['label'];

    if ($todo->deleteTodo($id)) {
        $_SESSION['msg'] = 'Todo apagado';
        header("location: ../views/todo.php?label=$label");
    } else {
        $_SESSION['erro'] = 'Erro ao tentar apagar';
        header("location: ../views/todo.php?label=$label");
    }
}
