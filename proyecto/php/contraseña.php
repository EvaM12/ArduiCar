<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../css/password.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>
<body>
<div> 
    <?php
        echo '<h2>Recuperar contraseña</h2>
        <form method="POST">
            <label for="login">Indique su nombre de usuario*</label><br>
            <input type="text" name="login" id="login" required placeholder="Nombre de usuario">
            <br>
            <label for="id" id="label2">Indique el correo electrónico*</label><br>
            <input type="email" name="email" id="email" required placeholder="Correo electronico">
            <br>
            <button>Recuperar</button>
        </form>
        <a href="../inicio.html" id="volver"><section>Volver</section></a>
        </div>';
    ?>
    <?php
    //meter el html como echo aqui y/o quitar el else
        $login = $_POST["login"];
        $email = $_POST["email"];

        if($login != '' && $email != ''){
            $mysql = mysqli_connect("localhost", "root", "");
            $mysql->select_db("proyecto");
            $query = "SELECT count(*) as num_usuario FROM usuarios WHERE login='$login' and email='$email'";
            $resultado = $mysql->query($query);
            $result = $resultado->fetch_assoc();

            if ($result["num_usuario"] != false) {
                $query1 = "SELECT * from usuarios WHERE login='$login' and email='$email' ";
                $resultado1 = $mysql->query($query1);
                $result1 = $resultado1->fetch_assoc();

                $mail=$result1["email"];
                $passwd = $result1["passwd"];

                mail($mail, "Recuperar los datos", "Haz click en este enlace: http://localhost/proyecto/php/cambiar.php");
            }
            else {
                echo'<script type="text/javascript">
                alert("Los datos no concuerdan con ningun usuario");
                // window.location.href="./contraseña.php";
                </script>';
            }
        }
    ?>
</body>
</html>