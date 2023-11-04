<?php include ("conexao.php");?>
<?php

    // Recupera os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Verifica se o usuário preencheu todos os campos obrigatórios
    if (empty($email) || empty($senha)) {
        echo "É necessário preencher usuário e senha! <br>";       
    }
    else {
        // Cria a consulta SQL para verificar se o usuário existe no banco de dados
        $query = "SELECT * FROM `usuario` WHERE `email` LIKE '$email' AND `senha` LIKE '$senha'";
        $resultado = mysqli_query($conn, $query);
        
        // Verifica se a consulta retornou algum resultado
        if (mysqli_num_rows($resultado) > 0) {
            // Usuário e senha corretos, redireciona para a página de destino
            header('Location:/index.php');
            exit();
        }
        else {
            header('Location:tela-login.php?login=failed');
            exit();
        }
    }
?>