<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Cadastro</title>
    <link rel="stylesheet" href="css/formC.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
</head>
<body>
    <div class="login-container">
        <!-- Área da ilustração -->
        <div class="illustration">
            <img src="../images/logo_bv.png" alt="Ilustração de cadastro">
        </div>

        <!-- Área do formulário -->
        <div class="form-section">
            <h2>Cadastro</h2>
            <form action="../manager/process_form.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" maxlength="11" required>

                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="Digite seu telefone" maxlength="15">

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>

                <button type="submit">Cadastrar</button>
            </form>
            <p>Já tem uma conta? <a href="cadastramento.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>
