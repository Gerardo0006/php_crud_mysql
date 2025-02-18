<?php

//Incluimos el fichero db.php para envíar los datos a la DB
include("db.php");

if(isset($_POST['save_task'])){
    // echo 'Saving task...';
    //Creamos variables para almacenar el título y la descripción de la tarea que recibimos por método POST
    $title = $_POST['title'];
    $description = $_POST['description'];

    //Insertamos valores en la DB
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($connection, $query);

    //Validamos que sí exista un resultado
    if(!$result){
        die("Query failed");
    }

    //echo 'Saved!';

    //Guardamos el mensaje en la sesión
    $_SESSION['message'] = 'Task saved succesfully!';
    $_SESSION['message_type'] = 'success';

    //Agregamos redirección a index.php
    header("Location: index.php");
}

?>