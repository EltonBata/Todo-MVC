<?php
include_once './header.php';
session_start();
?>



<div class="container col-lg-10 p-0 m-0">
    <div class="container-fluid m-0 head clearfix">
        <h3 class="float-start my-3">Todo</h3>
        <a href="./createTodo.php" class="btn-sm btn btn-success float-end my-3 border-white">Create Todo</a>
    </div>

    <?php if (isset($_SESSION['msg'])) { ?>

        <div class="alert alert-success alert-dismissible w-50 mt-2 mx-auto">
            <button class="btn-close" data-bs-dismiss='alert'></button>
            <?php echo $_SESSION['msg'];
            //session_destroy(); ?>
        </div>

    <?php } ?>

    <div class="container m-3 w-100 mx-auto">

        <table class="table table-stripped ">
            <thead class="text-muted">
                <th>Title</th>
                <th>Snippet</th>
                <th>Due Date</th>
                <th>Time Left</th>
                <th>Progress</th>
                <th>Actions</th>
            </thead>

            <tbody>

            </tbody>
        </table>

    </div>
</div>
</div>


<?php include_once './foot.php' ?>