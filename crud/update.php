<?php 

    include '../dataBase/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id;";
        $result = mysqli_query($conn,$query);


        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
        

    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', description = '$description' 
        WHERE id = '$id'; ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea Actualizada Correctamente';
        $_SESSION['color'] = 'info';
        
        header("Location:../index.php");
    }

?>

<?php include 'layouts/header.php'; ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title" value="<?php echo $title; ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control mb-3" rows="2"><?php  echo $description; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update" >Actualizar</button>
                        <a href="index.php" class="btn btn-danger" > Cancelar </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'layouts/footer.php'; ?>