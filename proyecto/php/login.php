<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $cmd="node http://localhost/proyecto/index.js";
        shell_exec($cmd);
    ?>
    <?php
        //securizar mas las contraseñas
        $login = $_POST["login"];
        $passwd = $_POST["passwd"];

        $mysql = mysqli_connect("localhost", "root", "");
        $mysql->select_db("proyecto");
        $query = "SELECT count(*) as num_usuario FROM usuarios WHERE login='$login' and passwd='$passwd'";
        $resultado = $mysql->query($query);
        $result = $resultado->fetch_assoc();

        if ($result["num_usuario"] == false) {
            echo "Autenticacion incorrecta";
            header('location: ../inicio.html');
        } else {
            session_start();
            $_SESSION["login"] = $login;

            echo'<script type="text/javascript">
            alert("Bienvenido '.$login.'");
            window.location.assign("http://localhost:3000");;
            </script>';
            //header('location: ../cmd.php');
        }
        
    ?>
</body>
</html>
<?php
