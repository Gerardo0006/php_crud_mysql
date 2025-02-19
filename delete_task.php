<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query filed!");
        }

        $_SESSION['message'] = 'Task removed succesfully';
        $_SESSION['message_type'] = 'danger';
        //Redireccionamos a index.php
        header("Location: index.php");
    }

?>