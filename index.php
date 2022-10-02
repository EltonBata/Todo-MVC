<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark shadow">
        <a href="#" class="navbar-brand ms-3 m-1 h3 ">Todo Maker</a>

    </nav>


    <div class="container-fluid border">

        <div class="form w-50 rounded-2 p-5 border">
            <h2 class="text-center border-bottom border-3 mb-3">Login</h2>
            <?php if (isset($_SESSION['error'])) { ?>

                <div class="alert alert-danger alert-dismissible">
                    <button class="btn-close" data-bs-dismiss='alert'></button>
                    <?php echo $_SESSION['error'];
                    session_destroy(); ?>
                </div>

            <?php } ?>

            <form action="./controllers/loginController.php" method="POST">
                <div class="container">
                    <label for="" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required minlength="4" maxlength="8">
                </div>

                <div class="container my-3">
                    <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
                </div>

                <a href="./views/createUser.php" class="text-decoration-none">Criar conta</a>
            </form>


        </div>
    </div>

</body>

</html>

<script src="./assets/js/login.js"></script>