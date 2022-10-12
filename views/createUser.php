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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>

 

    <div class="container-fluid border ">
        <div class="form w-50 rounded-2 p-2 border mx-auto mt-5">
            <h2 class="text-center border-bottom border-3 mb-3">Nova Conta</h2>
            <?php if (isset($_SESSION['error'])) { ?>

                <div class="alert alert-danger alert-dismissible">
                    <button class="btn-close" data-bs-dismiss='alert'></button>
                    <?php echo $_SESSION['error'];
                    session_destroy(); ?>
                </div>

            <?php } ?>
            <form action="../controllers/createUserController.php" method="POST">
                <div class="container">
                    <label for="" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" required minlength="4" maxlength="8">
                </div>

                <div class="container mt-2">
                    <label for="" class="form-label">Reescreva o password:</label>
                    <input type="password" class="form-control" name="re-password" required minlength="4" maxlength="8">
                </div>


                <div class="container my-3">
                    <button type="submit" name="entrar" class="btn btn-success">Registrar</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>