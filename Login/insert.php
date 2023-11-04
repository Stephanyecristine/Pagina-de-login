<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de cadastro para novos usuários">
    <link rel="shortcut icon" href="img/Icone.png" type="image/PNG" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style-cadastro-user.css">
</head>
<body>
<?php include ("conexao.php");?>
    <?php
    header('Content-Type: text/html; charset=UTF-8');

    $nome = $_POST["nome"];    
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $numero = $_POST["telefone"];

        $con = mysqli_connect($host, $usuario, $password, $bancodedados) or 
        die("Não foi possivel a conexão com o Banco de Dados");

        $query = "SELECT * FROM USUARIO WHERE EMAIL = '$email'";
        $resultado = mysqli_query($con, $query);

        if($con = mysqli_fetch_array($resultado)){
            header('location:cadastrar-user.php?cadastro=emailexistente');
        }else{
            $con = mysqli_connect($host, $usuario, $password, $bancodedados) or 
            die("Não foi possivel a conexão com o Banco de Dados");
                    
            $query = "INSERT INTO USUARIO VALUES ( '$nome', '$email', '$senha',NULL,'$numero')";
            $resultado = mysqli_query($con, $query) OR die("ERRO! Usuário não cadastrado");
            echo "Usuário cadastrado com sucesso! <br>";
            header('Location:tela-login.php?login=cadastrosucesso');
            exit();
        }   
    ?>
    <a href="cadastrar-user.php"><button class="btn">Voltar</button></a>    
</body>
</html>