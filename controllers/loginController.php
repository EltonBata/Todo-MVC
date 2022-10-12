<?php
session_start();
require_once '../models/Users.php';

if ($_SERVER['REQUEST'] = 'POST') {

    $user = new Users();

    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($user->login($username, $password)) {
        $_SESSION['username'] = $_POST['username'];
        header("location: ../views/todo.php");
    } else {
        $_SESSION['error'] = "Usuario ou Senha Invalidos";
        header('location: ../index.php');
    }
}
