<?php include("db.php")?> <!-- Es importante ésta línea ya que con ella le indicamos 
a nuestra app que lo primero que cargue al iniciar sea la conexión con la DB -->
<?php include("includes/header.php")?> <!-- Incluimos el archivo header.php en éste fichero -->

<div class="container p4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?> <!-- Muéstrame desde sesión el mensaje que he guardado -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST"> <!-- Le decimos que envíe el formulario al archivo save_task.php por método post -->
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Declaramos la consulta/petición a la DB -->
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php include("includes/footer.php")?> <!-- Inlcuimos el archivo footer.php en este fichero -->