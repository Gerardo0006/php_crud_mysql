<!--Aquí voy a generar la conexión con la base de datos usando la bibloteca de mysql 
mysqli y su función llamada connect -> mysqli_connect()
Dentro de ésta función le pasaremos los parámetros de nuestra base de datos. -->

<?php

    session_start(); //Inicializamos una sesión para guardar las tareas (en sesión)
    $connection = mysqli_connect(
        'localhost', /*Aquí va el servidor de la DB (puede ser una IP)*/
        'root', /*Aquí va el usuario de la DB */
        '', /*Aquí va la contraseña de la DB */
        'php_mysql_crud' /*Aquí va el nombre de la DB */
    );
    /*El script anterior me devuelve un objeto de coleccióno que hay que almacenarlo en una variable */
    //Verificamos que la FB esté conectada
    /*if(isset($connection)){
         echo "DB is connected!";
    }*/
?>