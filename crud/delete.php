<?php 

    include '../dataBase/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id;";
        mysqli_query($conn,$query);

        $_SESSION['message'] = 'Tarea Eliminada Correctamente';
        $_SESSION['color'] = 'danger';
        header("Location: ../index.php");

    }

?>