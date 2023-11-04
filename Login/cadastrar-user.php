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
<?php if (isset($_GET["cadastro"]) && $_GET["cadastro"] == "emailexistente") { ?>
    <script>
      alert("E-mail já existente. Por favor, tente outro e-mail.");
    </script>
  <?php } ?>
  <div id="tela-cadastro-usuario">
    <h1>Cadastro</h1>
    <form action="insert.php" method="POST" id="form-cadastro">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" maxlength="40" required>
      <p class="instrucoes" id="nome-instrucoes" style="display: none;">Por favor, digite um nome válido.</p>

      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone" maxlength="40" required>
      <p class="instrucoes" id="telefone-instrucoes" style="display: none;">Por favor, digite um número de telefone
        válido.</p>

      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Digite seu e-email" maxlength="40" required>
      <p class="instrucoes" id="email-instrucoes" style="display: none;">Por favor, digite um endereço de e-mail válido.
      </p>

      <label for="password">Senha</label>
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" maxlength="40" required>
      <p class="instrucoes" id="senha-instrucoes" style="display: none;">A senha precisa ter pelo menos um dígito
        especial, uma letra maiúscula, uma letra minúscula e não pode ter três números iguais em sequência, três letras
        iguais em sequência, três números em ordem, ou três letras em ordem alfabética.</p>


      <label for="password">Confirmar Senha</label>
      <input type="password" name="confsenha" id="confsenha" placeholder="Digite sua senha" maxlength="40" required>
      <p class="instrucoes" id="confsenha-instrucoes" style="display: none;">As senhas não coincidem. Por favor, tente
        novamente.</p>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="checkbox-preto">
        <label class="form-check-label" for=" " maxlength="20" id="labelCheck1"><!--for="defaultCheck1"-->
          Desejo receber notícias no meu e-mail
        </label>
      </div>
      <input type="submit" value="Cadastro" id="form-cadastro">
    </form>
  </div>
</body>
</html>

<script>
      // Adicione eventos de "blur" (perda de foco) aos campos de entrada
    document.getElementById('nome').addEventListener('blur', verificarNome);
    document.getElementById('telefone').addEventListener('blur', verificarTelefone);
    document.getElementById('email').addEventListener('blur', verificarEmail);
    document.getElementById('senha').addEventListener('blur', verificarSenha);
    document.getElementById('confsenha').addEventListener('blur', verificarConfSenha);

    function verificarNome() {
      // Obtenha o valor do campo de entrada
      var nome = document.getElementById('nome').value;

      // Verifique se o nome é válido
      if (nome.length < 3 || nome.length > 40) {
        // Exiba a mensagem de erro
        document.getElementById('nome-instrucoes').style.display = 'block';
      } else {
        // Oculte a mensagem de erro
        document.getElementById('nome-instrucoes').style.display = 'none';
      }
    }

    function verificarTelefone() {
      // Obtenha o valor do campo de entrada
      var telefone = document.getElementById('telefone').value;

      // Verifique se o número de telefone é válido
      if (isNaN(telefone) || telefone.length < 8 || telefone.length > 15) {
        // Exiba a mensagem de erro
        document.getElementById('telefone-instrucoes').style.display = 'block';
      } else {
        // Oculte a mensagem de erro
        document.getElementById('telefone-instrucoes').style.display = 'none';
      }
    }

    function verificarEmail() {
      // Obtenha o valor do campo de entrada
      var email = document.getElementById('email').value;

      // Verifique se o endereço de e-mail é válido
      if (email.indexOf('@') === -1 || email.length < 6 || email.length > 40) {
        // Exiba a mensagem de erro
        document.getElementById('email-instrucoes').style.display = 'block';
      } else {
        // Oculte a mensagem de erro
        document.getElementById('email-instrucoes').style.display = 'none';
      }
    }

    function verificarSenha(evento) {
      const senha = evento.target.value;

      //Verifique se o usuário adicionou algo
      if (senha.length === 0) {
        document.getElementById('senha-instrucoes').innerHTML = 'Por favor, digite uma senha.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Verifique se a senha tem pelo menos um dígito especial
      if (!/[^A-Za-z0-9]/.test(senha)) {
        document.getElementById('senha-instrucoes').innerHTML = 'A senha precisa ter pelo menos um dígito especial.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Verifique se a senha tem pelo menos uma letra maiúscula
      if (!/[A-Z]/.test(senha)) {
        document.getElementById('senha-instrucoes').innerHTML = 'A senha precisa ter pelo menos uma letra maiúscula.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Verifique se a senha tem pelo menos uma letra minúscula
      if (!/[a-z]/.test(senha)) {
        document.getElementById('senha-instrucoes').innerHTML = 'A senha precisa ter pelo menos uma letra minúscula.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Verifique se há três números iguais em sequência na senha
      if (/\d{3}/.test(senha)) {
        document.getElementById('senha-instrucoes').innerHTML = 'A senha não pode ter três números iguais em sequência.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Verifique se há três números em ordem na senha
      if (/123|234|345|456|567|678|789/.test(senha)) {
        document.getElementById('senha-instrucoes').innerHTML = 'A senha não pode ter três números em ordem.';
        document.getElementById('senha-instrucoes').style.display = 'block';
        return;
      }

      // Oculte a mensagem de erro
      document.getElementById('senha-instrucoes').style.display = 'none';
    }

    function verificarConfSenha() {
      // Obtenha o valor dos campos de entrada
      var senha = document.getElementById('senha').value;
      var confSenha = document.getElementById('confsenha').value;

      // Verifique se as senhas coincidem
      if (senha !== confSenha) {
        // Exiba a mensagem de erro
        document.getElementById('confsenha-instrucoes').style.display = 'block';
      } else {
        // Oculte a mensagem de erro
        document.getElementById('confsenha-instrucoes').style.display = 'none';
      }
    }
    document.getElementById('form-cadastro').addEventListener('submit', verificarFormulario);

    function verificarFormulario(evento) {
      // Obtenha todas as mensagens de erro
      var mensagensErro = document.getElementsByClassName('instrucoes');

      // Verifique se alguma mensagem de erro está visível
      for (var i = 0; i < mensagensErro.length; i++) {
        if (mensagensErro[i].style.display !== 'none') {
          // Impedir o envio do formulário
          evento.preventDefault();
          break;
        }
      }
    }

</script>