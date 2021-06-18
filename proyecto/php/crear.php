<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Arduicar</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>
<body>
    <article id="creaphp">
        <h2>Registro</h2>
        <p style='color:red; text-align:center;'>&nbsp;
        <?php
            session_start();
            if($_SESSION["existe"]==1){
                echo "El usuario indicado ya existe en el sistema.";
            }
            else{
                echo "";
            }
            $_SESSION["existe"]=0;
        ?>
        </p>
        <form method="get" action="http://localhost/proyecto/php/crear2.php" >
            <label for="email">Indique un correo electronico*</label>
            <input type="email" id="email" name="email" placeholder="Correo electronico" required>
            <label for="login2">Indique un nombre de usuario*</label><br>
            <input type="text" name="login2" id="login2" placeholder="Nombre de usuario" required>
            <br>
            <label for="passwd2" id="label2">Indique una contraseña*</label><br>
            <input type="password" name="passwd2" id="passwd2" placeholder="Contraseña" required>
            <br>
            <button id="create">Crear usuario</button>
        </form>
        <a href="../inicio.html" id="volver"><section>Volver</section></a>
        </article>
    <?php
    /*session_start();
    if($_SESSION["existe"]==1){
        echo "<p style='color:white'>Las credenciales indicadas ya existen en el sistema.</p>";
    }
    else{
        echo "";
    }
    $_SESSION["existe"]=0;*/
    ?>
</body>
</html>