

<?php 

    include '../dataBase/db.php';

    if (isset($_POST['guardarTarea'])) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO task(title, description)
                    VALUES ('$title', '$description');";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Fallida");
        }

        $_SESSION['message'] = 'Tarea guardada correctamente' ;
        $_SESSION['color'] = 'success';

        header("Location: ../index.php");
    }

?>