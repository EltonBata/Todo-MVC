<?php
session_start();
include_once './header.php';

?>


<div class="container mt-3 p-0">


    <div class="container-fluid m-0 head clearfix border border-bottom-2">
        <h3 class="float-start my-3">Create Todo</h3>

    </div>

    <div class="container-fluid p-0 d-flex main">

        <nav class="navbar bg-dark col-lg-2 menu">

            <div class="container-fluid">

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./todo.php?label=inbox"><i class="fas fa-book"></i>Inbox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./todo.php?label=read_later">Read Later</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./todo.php?label=important">Important</a>
                    </li>
                </ul>
            </div>

        </nav>




        <!-- FORMULARIO PARA ADICIONARIO UM NOVO TO DO            -->





        <div class="container my-3 p-0 form">

            <form action="../controllers/createTodoController.php" method="POST">
                <div class="container">
                    <label for="" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Description:</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Due Date:</label>
                    <input type="datetime-local" class="form-control" name="date">
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Label Under:</label>
                    <select name="label" id="" class="form-select">
                        <option value=""></option>
                        <option value="inbox">Inbox</option>
                        <option value="read_later">Read Later</option>
                        <option value="important">Important</option>
                    </select>
                </div>


                <div class="container my-3">
                    <button type="submit" name="entrar" class="btn btn-success">Create</button>
                </div>

            </form>


        </div>

    </div>