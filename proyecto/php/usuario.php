<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>
<body>
    <input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel">
        <h2>ArduiCar</h2>
        <ul>
            <a href="http://localhost:3000"><li>Controles</li></a> 
            <a href="manual coche"><li>Activar coche</li></a> <!--http://localhost/proyecto/php/cierre.php -->
            <a href="manual extras"><li>Activar sensores</li></a> <!--http://localhost/proyecto/php/cierre.php -->
            <a href="http://localhost/proyecto/php/cierre.php"><li>Cerrar sesión</li></a>
        </ul>
    </div>
    <div class="centro">
        <figcaption>
            <img src="../img/user.png" alt="">
        </figcaption>
        <h2>Información de usuario</h2>
        <div id="tabla">
            <table>
                <tr>
                    <th><b>Nombre de usuario: &nbsp;</b></th>
                    <td><?php
                        session_start();
                        echo $_SESSION["login"],"<br>";
                    ?></td>
                </tr>
                <tr>
                    <th><b>Nombre: &nbsp;</b></th>
                    <td><?php
                        echo $_SESSION["login"],"<br>";
                    ?></td>
                </tr>
                <tr>
                    <th><b>Apellidos: &nbsp;</b></th>
                    <td><?php
                        echo $_SESSION["login"],"<br>";
                    ?></td>
                </tr>
                <tr>
                    <th><b>Email: &nbsp;</b></th>
                    <td><?php
                        $login=$_SESSION["login"];
                        $mysql = mysqli_connect("localhost", "root", "");
                        $mysql->select_db("proyecto");
                        $query = "SELECT * FROM usuarios WHERE login='$login'";
                        $resultado = $mysql->query($query);
                        $result = $resultado->fetch_assoc();

                        $mail=$result["email"];
                        echo $mail;
                    ?></td>
                </tr>
            </table>
        </div>
    <a href="http://localhost/proyecto/php/cambiar.php" id="changepasswd"><section>Cambiar credenciales</section></a>
    </div>
</body>
</html>