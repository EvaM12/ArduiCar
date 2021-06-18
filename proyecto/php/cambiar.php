<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Arduicar</title>
    <link rel="stylesheet" href="../css/cambiar.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>
<body>
    <article id="creaphp">
        <h2>Cambio de datos</h2>
        <form method="get" action="http://localhost/proyecto/php/crear2.php" >
            <label for="emailNew">Indique su nuevo correo electronico*</label>
            <input type="email" id="emailNew" name="emailNew" placeholder="Correo electronico" required>
            <label for="loginNew">Indique un nuevo nombre de usuario*</label><br>
            <input type="text" name="loginNew" id="loginNew" placeholder="Nombre de usuario" required>
            <br>
            <label for="passwdNew" id="label2">Indique una nueva contraseña*</label><br>
            <input type="password" name="passwdNew" id="passwdNew" placeholder="Contraseña" required>
            <br>
            <button id="create">Cambiar datos</button>
        </form>
        <a href="../inicio.html" id="volver"><section>Volver</section></a>
        </article>
</body>
</html> -->
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
    <div class="centro">
        <h2 id="titulo">Cambio de datos</h2>
        <form method="get" action="http://localhost/proyecto/php/cambiar2.php" >
        <div id="tabla">
            <table>
                <tr>
                    <th><b>Nombre de usuario: &nbsp;</b></th>
                </tr>
                <tr>
                    <td><input type="text" name="login" id="login" required></td>
                </tr>
                <tr>
                    <th><b>Nuevo nombre de usuario: &nbsp;</b></th>
                </tr>
                <tr>
                    <td><input type="text" name="loginNew" id="loginNew" placeholder="Rellenar solo si se desea cambiar"></td>
                </tr>
                <tr>
                    <th><b>Nueva contraseña: &nbsp;</b></th>
                </tr>
                <tr>
                    <td><input type="password" name="passwdNew" id="passwdNew" placeholder="Rellenar solo si se desea cambiar"></td>
                </tr>
                
                <tr>
                    <th><b>Nuevo email: &nbsp;</b></th>
                </tr>
                <tr>
                    <td><input type="email" name="emailNew" id="emailNew" placeholder="Rellenar solo si se desea cambiar"></td>
                </tr>
            </table>
            <button id="create">Cambiar datos</button>
        </form>
    </div>
</body>
</html>