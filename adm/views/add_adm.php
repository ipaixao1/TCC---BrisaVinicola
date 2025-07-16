<?php
require dirname(__DIR__) . "/controllers/admManager.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager = new admManager();
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $status = $_POST['status'];
    $poder = $_POST['poder'];
    $manager->createAdm($nome, $email, $cpf, $senha, $telefone, $status, $poder);
    header("Location: admin_list.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar | ADM</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img_cart/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/adm.css">
    <script src="perfil.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
    rel="stylesheet"
    href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      :root {
    --black: #0B0B0B;
    --black1: #000;
    --beige: #C0A788;
    --white: #1f2124;
    --white2: #d3d3d3;
    --gray: #5e5e5e;
}

body {
    background-color: var(--white);
    font-family: Arial, sans-serif;
    color: var(--white2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;  /* Centraliza verticalmente */
    margin: 0;
}

form {
    background-color: var(--black);
    padding: 20px;
    border-radius: 8px;
    width: 300px;  /* Reduz o tamanho do formulário */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

form h2 {
    color: var(--beige);
    text-align: center;
    margin-bottom: 20px;
}

label {
    color: var(--white2);
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid var(--black1);
    border-radius: 4px;
    background-color: var(--black1);
    color: var(--beige);
    font-size: 14px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
    outline: none;
    border-color: var(--black1);
}

select {
    background-color: var(--black1);
    color: var(--beige);
}

option {
    background-color: var(--black1);
    color: var(--beige);
}

input[type="submit"] {
    background-color: var(--black1);
    color: var(--beige);
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: var(--black1);
    color: var(--beige);
}
button{
    padding: 10px;
            background-color: var(--black1);
            color: var(--beige);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
}


    </style>
</head>
<body>
<div class="login-container">
    <form class="login-form" method="POST" enctype="multipart/form-data">
    <h2>Adicionar Adm</h2>
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        <label>Email:</label><br>
        <input type="text" name="email" required><br>
        <label>CPF:</label><br>
        <input type="text" name="cpf" required><br>
        <label>Senha:</label><br>
        <input type="text" name="senha" required><br>
        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br>
        <label>Status:</label><br>
        <select name="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select><br>
        <label>Poder:</label><br>
        <select name="poder">
            <option value="9">Sysop</option>
            <option value="8">Gerente</option>
            <option value="7">Supervisor</option>
            <option value="6">Coordenador</option>
            <option value="5">Analista</option>
            <option value="4">Assistente </option>
            <option value="3">Técnico </option>
            <option value="2">Auxiliar </option>
            <option value="1">Operador </option>
        </select>
        <button type="submit">Adicionar adm</button>
    </form>
</div>
</body>
</html>
