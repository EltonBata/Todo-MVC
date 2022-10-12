<?php
require_once '../models/Todo.php';
session_start();

$todo = new Todo();

$label = null;

if (isset($_GET['label'])) {
    $label = $_GET['label'];
}

$dados = $todo->listTodo($_SESSION['username'], $label);

?>