<?php
session_start();
$host = 'localhost';
$dbname = 'brisavinicola';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nome'])) { // Cadastro
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
            $telefone = $_POST['telefone'];

            $stmt = $pdo->prepare("INSERT INTO cliente (nome, email, cpf, senha, telefone) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $cpf, $senha, $telefone]);

            echo "<script>alert('Cadastro realizado com sucesso! Faça login para continuar.'); window.location.href = '../view/cadastramento.php';</script>";
        } elseif (isset($_POST['email']) && isset($_POST['senha'])) { // Login
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $stmt = $pdo->prepare("SELECT * FROM cliente WHERE email = ? AND status = 'ativo'");
            $stmt->execute([$email]);
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($cliente && password_verify($senha, $cliente['senha'])) {
                $_SESSION['cliente_id'] = $cliente['id'];
                $_SESSION['cliente_nome'] = $cliente['nome'];
                header("Location: ../view/cliente.php");
                exit;
            } else {
                echo "<script>alert('Email ou senha incorretos!'); window.location.href = '../index.php';</script>";
            }
        }
    }

     // Validar o reCAPTCHA com a API do Google
     $recaptcha_secret = 'SUA_SECRET_KEY';
     $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
     $recaptcha_data = [
         'secret' => $recaptcha_secret,
         'response' => $recaptcha_response,
         'remoteip' => $_SERVER['REMOTE_ADDR']
     ];
 
     // Enviar a solicitação para validar o reCAPTCHA
     $options = [
         'http' => [
             'method' => 'POST',
             'header' => 'Content-Type: application/x-www-form-urlencoded',
             'content' => http_build_query($recaptcha_data)
         ]
     ];
     $context = stream_context_create($options);
     $response = file_get_contents($recaptcha_verify_url, false, $context);
     $recaptcha_result = json_decode($response, true);
 
     // Verificar se o reCAPTCHA foi validado
     if (!$recaptcha_result['success']) {
         die('Falha na validação do reCAPTCHA. Por favor, tente novamente.');
     }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
