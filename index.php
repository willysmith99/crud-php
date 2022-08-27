<?php include 'dataBase/db.php'; ?>

<?php include 'layouts/header.php'; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show       role=" alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>

            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="crud/save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control mb-3" placeholder="Ingrese el titulo de la tarea" autofocus required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" cols="2" class="form-control mb-3" placeholder="Ingresa la descripción" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="guardarTarea" value="Guardar Tarea">
                        <img src="img/agregar2.png" width="30" alt=""> Agregar
                    </button>

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php

                $query = "SELECT * FROM task";
                $taks = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($taks)) { ?>

                    <tbody class="align-middle">
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <div class="text-center" role="group">
                                <a class="m-1 btn btn-primary" href="crud/update.php?id=<?php echo $row['id']; ?>"><img src="img/editar2.png" width="20" alt=""> Update</a>
                                |
                                <a class="m-1 btn btn-danger" href="crud/delete.php?id=<?php echo $row['id']; ?>"> <img src="img/basura.png" width="20" alt=""> Delete </a>
                            </div>
                        </td>
                        </td>
                    </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>