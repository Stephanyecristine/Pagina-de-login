<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexão</title>
    <link rel="sortcut icon" href="img/Icone.png" type="image/PNG" />
</head>
<body>
<?php
    $host = "127.0.0.1";
    $usuario = "root";
    $password = "";
    $bancodedados = "usuario";


    $conn = mysqli_connect($host, $usuario, $password, $bancodedados);

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    echo "Conexão realizada com sucesso";
?>

</body>