 <?php
    session_start();
    require_once '../models/Todo.php';

   

    if ($_SERVER['REQUEST'] = 'POST') {

        $todo = new Todo();

        $username = 'user';

        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        $date = strtotime($_POST['date']);

        $params = [
            $username,
            $_POST['title'],
            $_POST['description'],
            date('Y-m-d', $date),
            date('Y-m-d'),
            $_POST['label']
        ];

        if ($todo->createTodo($params) > 0) {

            $_SESSION['success'] = "Todo criado com sucesso!";
            header('location: ../views/createTodo.php');
           
        } else {
            $_SESSION['error'] = "Todo nao  criado";
        }
    }




    ?>