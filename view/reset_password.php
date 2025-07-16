<?php
// Conectar ao banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=brisavinicola', 'root', '');

// Verificar se o e-mail foi passado pela URL
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Verificar se o e-mail existe no banco de dados
    $stmt = $pdo->prepare("SELECT id FROM cliente WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o e-mail não existe, redireciona de volta para a página de "Esqueci a Senha"
    if (!$user) {
        echo "Este e-mail não está registrado.";
        exit;
    }
} else {
    // Se não receber o e-mail na URL, redireciona para a página de "Esqueceu a Senha"
    header("Location: forgot_password.php");
    exit;
}

// Verificar se o formulário de redefinição de senha foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $nova_senha = $_POST['senha'];  // A senha fornecida pelo usuário

    // Validar se a nova senha foi fornecida
    if (empty($nova_senha)) {
        echo "Por favor, insira uma nova senha.";
        exit;
    }

    // Hash da nova senha
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_BCRYPT);

    // Atualizar a senha no banco de dados
    try {
        // Preparar a consulta SQL para atualizar a senha
        $stmt = $pdo->prepare("UPDATE cliente SET senha = ? WHERE email = ?");
        $stmt->execute([$nova_senha_hash, $email]);

        // Verificar se a senha foi alterada com sucesso
        if ($stmt->rowCount() > 0) {
            // Exibir mensagem de sucesso e redirecionar para a página de login
            echo "<script>
                    alert('Senha alterada com sucesso!');
                    window.location.href = 'cadastramento.php';  // Redireciona para a página de login
                  </script>";
            exit;
        } else {
            echo "Erro ao alterar a senha. Tente novamente.";
            exit;
        }
    } catch (Exception $e) {
        echo "Erro ao processar a solicitação: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Redefinir Senha</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
    <style>
        :root {
            --black: #0B0B0B;
            --beige: #C0A788;
            --white: #1f2124;
            --white2: #d3d3d3;
            --gray: #5e5e5e;
        }
        body {
            background-color: var(--black);
        }

        .reset-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: var(--black);
        }

        .reset-logo {
            margin-bottom: 20px;
        }

        .reset-logo img {
            width: 100px;
            height: auto;
        }

        .reset-form {
            background-color: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
        }

        .reset-form h2 {
            text-align: center;
            color: var(--beige);
            margin-bottom: 20px;
        }

        .reset-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--black);
            border-radius: 5px;
        }

        .reset-form button {
            padding: 10px;
            background-color: var(--black);
            color: var(--beige);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .reset-form button:hover {
            background-color: var(--beige);
            color: var(--black);
        }

        .reset-form input {
            background-color: var(--gray);
            color: var(--white2);
            border-color: var(--gray);
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-logo">
            <img src="../adm/views/img_cart/logo_bv.png" alt="Brisa Vinícola">
        </div>
        <form action="reset_password.php?email=<?php echo htmlspecialchars($email); ?>" class="reset-form" method="POST">
            <h2>Digite sua nova Senha</h2>
            <input type="password" name="senha" required>
            <button type="submit">Redefinir Senha</button>
        </form>
    </div>
</body>
</html>
