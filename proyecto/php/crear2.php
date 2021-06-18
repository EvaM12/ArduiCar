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
    session_start();
    session_destroy();
    session_start();

    $login2 = $_GET['login2'];
    $passwd2 = $_GET["passwd2"];
    $email = $_GET["email"];
    
    $mysql = mysqli_connect("localhost", "root", "");
    $mysql->select_db("proyecto");
    $query = "SELECT count(*) as num_usuario FROM usuarios WHERE login='$login2'";
    //solo se necesita el login xq es una funcion suprayectiva
    $resultado = $mysql->query($query);
    $result = $resultado->fetch_assoc();

    $_SESSION["existe"]=0;

    if ($result["num_usuario"] == true) {
        $_SESSION["existe"]=1;
        header('location: crear.php');
    } else {
        $query1 = "INSERT INTO usuarios(id, login, passwd, email) VALUES (null,'$login2','$passwd2', '$email')";
        $resultado1 = $mysql->query($query1);

        echo'<script type="text/javascript">
            alert("Usuario creado correctamente");
            window.location.href="../inicio.html";
            </script>';

            $query2 = "SELECT id FROM usuarios WHERE login='$login2'";
            //solo se necesita el login xq es una funcion suprayectiva
            $resultado2 = $mysql->query($query2);
            $result2 = $resultado2->fetch_assoc();

            $id = $result2["id"];

            mail($email, "Credenciales del usuario", "El registro se ha realizado correctamente.");
    }
    ?>
</body>
</html>