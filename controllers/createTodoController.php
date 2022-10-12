 <?php
    session_start();
    require_once '../models/Todo.php';
    date_default_timezone_set('Africa/Maputo');

   

    if ($_SERVER['REQUEST'] = 'POST') {

        $todo = new Todo();

        $username = '';

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }

        $date = strtotime($_POST['date']);
        $label = $_POST['label'];

        $params = [
            $username,
            $_POST['title'],
            $_POST['description'],
            date('Y-m-d h:i:sa', $date),
            date('Y-m-d h:i:sa'),
            $_POST['label']
        ];

        if ($todo->createTodo($params) > 0) {

            $_SESSION['success'] = "Todo created sucessfully!";
            header("location: ../views/todo.php?label=$label");
           
        } else {
            $_SESSION['error'] = "Error on create Todo";
            header("location: ../views/todo.php?");
        }
    }




    ?>