<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Página de login de usuários">
  <title>Login</title>
  <link rel="sortcut icon" href="img/Icone.png" type="image/PNG" />
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style-login.css">
</head>

<body>
  <?php if (isset($_GET["login"]) && $_GET["login"] == "failed") { ?>
    <script>
      alert("E-mail ou senha inválidos. Por favor, tente novamente.");
    </script>
  <?php } ?>
  <?php if (isset($_GET["login"]) && $_GET["login"] == "cadastrosucesso") { ?>
    <script>
      alert("Cadastro realizado com sucesso.");
    </script>
  <?php } ?>
  <div id="tela-login">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Digite seu e-mail" autocomplete="off" required>
      <p class="instrucoes" id="email-instrucoes" style="display: none;">Por favor, digite um e-mail.</p>
      <label for="password">Senha</label>
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
      <p class="instrucoes" id="senha-instrucoes" style="display: none;">Por favor, digite uma senha</p>
      <p id="mensagem-erro" style="display: none;">Login não encontrado. Por favor, verifique o e-mail e a senha e tente novamente.</p>

      <a href="#" id="refenir-senha">Esqueceu a senha?</a>
      <div class="form-check">
        <!--<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">-->

        <label class="form-check-label" for=" " maxlength="20" id="labelCheck1"><!--for="defaultCheck1"-->
          <input type="checkbox" checked>
          <span class="checkmark">Manter conectado</span>
    
        </label>
      </div>
      <input type="submit" value="Login" id="botaoLogar" name="botaoLogar">
      <input type="submit" formaction="\index.php" value="Voltar">
    </form>
    <div id="rede-social">
      <p>Ou entre pelas suas redes sociais</p>
      <a style="text-decoration: none;"
        href="https://www.facebook.com/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri=YOUR_REDIRECT_URI">
        <i class="fa fa-facebook-f"></i>
      </a>
      <a style="text-decoration: none;"
        href="https://www.facebook.com/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri=YOUR_REDIRECT_URI">
       	<i class="fa fa-linkedin"></i>
      </a>
    </div>
    <div id="criar-conta">
      <p>Ainda não tem uma conta?</p>
      <a href="cadastrar-user.php">Registrar</a>
    </div>
  </div>
</body>
</html>

<script>
    document.getElementById('email').addEventListener('blur', verificarEmail);
    document.getElementById('senha').addEventListener('blur', verificarSenha);
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
      // Oculte a mensagem de erro
      document.getElementById('senha-instrucoes').style.display = 'none';
    }
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

