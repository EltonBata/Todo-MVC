<?php
session_start();
require_once '../models/Todo.php';
include_once './header.php';

    $todo = new Todo();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $label = $_GET['label'];
        $dados = $todo->listTodoId($id);
    }

?>


<div class="container mt-3 p-0">

    <div class="container-fluid m-0 head clearfix border border-bottom-2">
        <h3 class="float-start my-3">Edit Todo</h3>

    </div>

    <div class="container-fluid p-0 d-flex">

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

            <form action="../controllers/editTodoController.php" method="POST">
                <input type="hidden" name="id" value= "<?php echo $id ?>">
                <input type="hidden" name="label" value= "<?php echo $label ?>">

                <div class="container">
                    <label for="" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" required value="<?php echo $dados->title ?>">
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Description:</label>
                    <textarea name="description" class="form-control"><?php echo $dados->description ?></textarea>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Due Date:</label>
                    <input type="date" class="form-control" name="date"  value="<?php echo $dados->due_date ?>">
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Label Under:</label>
                    <select name="label" id="" class="form-select"   value="<?php echo $dados->label ?>">
                        <option value=""></option>
                        <option value="inbox" <?php if($label == 'inbox'){ ?>selected <?php } ?> >Inbox</option>
                        <option value="read_later" <?php if($label == 'read_later'){ ?>selected <?php } ?> >Read Later</option>
                        <option value="important" <?php if($label == 'important'){ ?>selected <?php } ?> >Important</option>
                    </select>
                </div>


                <div class="container my-3">
                    <button type="submit" name="entrar" class="btn btn-success">Criar</button>
                </div>

            </form>


        </div>

    </div>