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
    $loginNew = $_GET['loginNew'];
    $passwdNew = $_GET["passwdNew"];
    $emailNew = $_GET["emailNew"];
    $login = $_GET["login"];

    $mysql = mysqli_connect("localhost", "root", "");
    $mysql->select_db("proyecto");
    $query = "SELECT count(*) as num_usuario FROM usuarios WHERE login='$login'";
    $resultado = $mysql->query($query);
    $result = $resultado->fetch_assoc();

    if($result["num_usuario"] == true){
        if(strlen($loginNew) != 0){
            $query1 = "UPDATE usuarios set login='$loginNew' where login='$login'";
            $resultado1 = $mysql->query($query1);
            echo'<script type="text/javascript">
                alert("Se cambio el nombre de usuario");
                </script>';
        };
        if(strlen($passwdNew) != 0){
            $query1 = "UPDATE usuarios set passwd='$passwdNew' where login='$login'";
            $resultado1 = $mysql->query($query1);
            echo'<script type="text/javascript">
                alert("Se cambio la contraseña");
                </script>';
        };
        if(strlen($emailNew) != 0){
            $query1 = "UPDATE usuarios set email='$emailNew' where login='$login'";
            $resultado1 = $mysql->query($query1);
            echo'<script type="text/javascript">
                alert("Se cambio el correo electronico");
                </script>';
        };

        echo'<script type="text/javascript">
            window.location.href="http://localhost/proyecto/inicio.html";
            </script>';
    }



    // if ($result["num_usuario"] == true) {
    //     $_SESSION["existe"]=1;
    //     header('location: crear.php');
    // } else {
    //     $query1 = "INSERT INTO usuarios(id, login, passwd, email) VALUES (null,'$login2','$passwd2', '$email')";
    //     $resultado1 = $mysql->query($query1);

    //     echo'<script type="text/javascript">
    //         alert("Usuario creado correctamente");
    //         window.location.href="../inicio.html";
    //         </script>';

    //         $query2 = "SELECT id FROM usuarios WHERE login='$login2'";
    //         //solo se necesita el login xq es una funcion suprayectiva
    //         $resultado2 = $mysql->query($query2);
    //         $result2 = $resultado2->fetch_assoc();

    //         $id = $result2["id"];

    //         mail($email, "Credenciales del usuario", "Sus credenciales de usuario son: \n
    //         Usuario = '$login2'. \n
    //         Contraseña = '$passwd2'. \n
    //         ID = '$id'. \n");
    // }
    ?>
</body>
</html>