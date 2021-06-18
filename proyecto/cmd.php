<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comandos</title>
</head>
<body>
    <!-- Aqui se ejecutan los comandos que inician la instancia de node. -->
    <?php
        $cmd="node http://localhost/proyecto/index.js";
        shell_exec($cmd);
        $cmd="node C:\xampp\htdocs\proyecto\index.js";
        shell_exec($cmd);
        $cmd="node C:/xampp/htdocs/proyecto/index.js";
        shell_exec($cmd);
        header('location: http://localhost:3000');
    ?>
</body>
</html>