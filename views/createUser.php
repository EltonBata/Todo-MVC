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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Peralta">
</head>

<body>


    <?php if (isset($_SESSION['error'])) { ?>

        <div class="alert alert-danger alert-dismissible w-25 mx-auto position-absolute">
            <button class="btn-close" data-bs-dismiss='alert'></button>
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>

    <?php } ?>


    <div class="container-fluid ">

        <h1 class="text-center mt-5 mb-3">Todo Maker</h1>


        <div class="form w-50 rounded-2 p-4 border mx-auto createuser">

            <div class="logo d-flex justify-content-center align-items-center mx-auto rounded-circle">
                <i class="fas fa-address-card"></i>
            </div>

            <form action="./controllers/createUserController.php" method="POST">
                <div class="input-group mt-3 shadow-sm username">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" oninput="validacao(this)" onblur="validacao(this)" placeholder="Enter your username" required>
                    <span class="input-group-text validate"><i class=""></i></span>
                </div>
                <small class="text-danger"></small>

                <div class="input-group mt-3 shadow-sm email">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" oninput="validacao(this)" onblur="validacao(this)" placeholder="Enter your email" required>
                    <span class="input-group-text validate"><i class=""></i></span>
                </div>
                <small class="text-danger" id="small"></small>

                <div class="input-group mt-3 shadow-sm">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control" id="password" name="password" oninput="validacao(this)" onblur="validacao(this)" placeholder="Enter your password" required minlength="4" maxlength="8">
                    <span class="input-group-text validate"><i class=""></i></span>
                </div>
                <small class="text-danger"></small>

                <div class="input-group mt-3 shadow-sm">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control" id="re-password" disabled name="re-password" oninput="validacao(this)" onblur="validacao(this)" placeholder="Rewrite your password" required minlength="4" maxlength="8">
                    <span class="input-group-text validate"><i class=""></i></span>
                </div>
                <small class="text-danger"></small>


                <div class="mt-3">
                    <button type="submit" name="entrar" class="btn btn-success">Register</button>
                </div>

                <div class="container clearfix">
                    <a href="../index.php" class="btn text-primary text-decoration-none float-end create">I already have an account</a>
                </div>

            </form>
        </div>




    </div>


</body>

</html>

<script src="../assets/js/login.js"></script>
<script src="../assets/js/validaInputAJAX.js"></script>