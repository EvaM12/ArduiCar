<?php
    session_start();
    session_destroy();//cerrar sesion
    unset($_POST["login"],$_POST["passwd"],$_POST["email"]);//eliminar los datos enviados por POST
    header('location: ../inicio.html');
?>
