<?php
session_start();
require_once '../models/Users.php';

if ($_SERVER['REQUEST'] = 'POST') {

    $user = new Users();

    $dados = [
        $_POST['username'],
        password_hash($_POST['password'], PASSWORD_BCRYPT),
        date('Y-m-d'),
        time(),
        $_POST['email'],
        1
    ];

    if ($user->verifyUser($_POST['username']) == 0) {
        if ($_POST['password'] == $_POST['re_password']) {
            if ($user->addUser($dados) == 1) {
                $_SESSION['user'] = $_POST['username'];
                header("location: ../views/todo.php");
                exit();
            } else {
                $_SESSION['error'] = "Usuario nao registrado";
            }
        }else{
            $_SESSION['error'] = "Digitou passwords diferentes";
            // header("location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Username ja existe";
        // header("location: ../index.php");
        exit();
    }
}
