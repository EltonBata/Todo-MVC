<?php

include_once './header.php';
require_once '../controllers/viewTodoController.php';
?>



<div class="container mt-3 p-0">

    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible w-25 mx-auto float-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo $_SESSION['error']; ?>
        </div>
    <?php }
    if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-success alert-dismissible w-25 mx-auto float-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php echo $_SESSION['msg']; ?>
        </div>
    <?php } ?>


    <div class="container-fluid m-0 head clearfix border border-bottom-2">
        <h3 class="float-start my-3">Todo</h3>
        <a href="./createTodo.php" class="btn-sm btn btn-success float-end my-3 border-white">Create Todo</a>
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


        <div class="container my-3 p-0 tabela col-lg-10">

            <h3 class="text-center text-muted"><?php if(isset($_GET['label'])){ echo $_GET['label']; }else{ echo ""; } ?></h3>
            <table class="table table-striped ">
                <thead class="text-muted">
                    <th>Title</th>
                    <th>Snippet</th>
                    <th>Due Date</th>
                    <th>Time Left</th>
                    <th>Progress</th>
                    <th>Actions</th>
                </thead>

                <tbody>

                    <?php

                    if (!empty($dados)) {

                        foreach ($dados as $key => $value) {

                            $today = strtotime('now');
                            $due = strtotime($value->due_date);
                            $time_left = $due - $today;

                            if (date('d', $time_left) <= 1) {
                                $time_left = round($time_left / 3600) . ' hours';
                            } else {
                                $time_left = date('d', $time_left) . " days left";
                            }

                            if ($today > $due) {
                                $time_left = "Expired";
                            }
                    ?>
                            <tr>
                                <td><?php echo $value->title ?></td>
                                <td><?php echo $value->description ?></td>
                                <td><?php echo $value->due_date ?></td>
                                <td><?php echo $time_left ?></td>
                                <td>
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?php echo $value->progress ?>%; background-color: #315259"><?php echo $value->progress ?>%</div>
                                </td>
                                <td>
                                    <a href="./editTodo.php?id=<?php echo $value->id ?>&label=<?php echo $value->label ?>">Edit</a>
                                    <a href="../controllers/deleteTodoController.php?id=<?php echo $value->id ?>&label=<?php echo $value->label ?>">Delete</a>
                                </td>
                            </tr>

                    <?php  }
                    } else {
                        echo "<td colspan='6' class = 'text-center'>Sorry, no Todos</td>";
                    }
                    ?>


                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include_once './foot.php' ?>