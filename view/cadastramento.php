<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Login</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LdDKogqAAAAAKiMEpvyjpeXu7HvyLeDrxckB7Xb', {action: 'LOGIN'});
    });
  }
</script>
    <div class="login-container">
        <!-- Área da ilustração -->
        <div class="illustration">
            <img src="../images/logo_bv.png" alt="Ilustração de login">
        </div>
        
        <!-- Área do formulário -->
        <div class="form-section">
            <h2>Login</h2>
            <form action="../manager/process_form.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <p style="margin-top:-4px; text-align: right; margin-bottom: 5px;"><a href="forgot_password.php" >Esqueceu a senha?</a></p>

                <div class="options">
                    <div class="g-recaptcha" data-sitekey="6Lcil40qAAAAAAzkIhaYHhuBql_eYsU2CEO39AYz"></div>
                </div> <!-- options -->    

                <button type="submit">Entrar</button>
            </form>
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div> <!-- form-section -->
    </div> <!-- container -->
</body>
</html>
