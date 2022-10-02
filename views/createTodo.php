<?php
session_start();
include_once './header.php';
?>

<div class="container col-lg-10 p-0 m-0">
    <div class="container-fluid m-0 head">
        <h3 class="py-3">Create Todo</h3>
    </div>
    <?php if (isset($_SESSION['error'])) { ?>

        <div class="alert alert-danger alert-dismissible">
            <button class="btn-close" data-bs-dismiss='alert'></button>
            <?php echo $_SESSION['error'];
            session_destroy(); ?>
        </div>

    <?php } ?>

    <div class="container m-3 w-75">

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
                <input type="date" class="form-control" name="date">
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
                <button type="submit" name="entrar" class="btn btn-success">Criar</button>
            </div>

        </form>

    </div>
</div>
</div>


<?php include_once './foot.php' ?>