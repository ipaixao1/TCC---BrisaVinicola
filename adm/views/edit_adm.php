<?php
require dirname(__DIR__) . "/controllers/admManager.php";

$manager = new admManager();
$id = $_GET['id'];
$adm = $manager->getAdmByID($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $status = $_POST['status'];
    $poder = $adm['poder'];

    $manager->updateAdmByID($id, $nome, $email, $cpf, $senha, $telefone, $status, $poder);
    header("Location: admin_list.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar | ADM</title>
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
    border: 1px solid var(--gray);
    border-radius: 4px;
    background-color: var(--black1);
    color: var(--beige);
    font-size: 14px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input [type="tel"]:focus,
select:focus {
    outline: none;
    border-color: var(--beige);
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
    background-color: var(--beige);
    color: var(--black1);
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
    input[readonly] {
      background-color: var(--black1);
      color: var(--beige);
      border: 1px solid #ccc;
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
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
        </div>
    <form class="login-form" method="POST" enctype="multipart/form-data">
    <h2>Editar Adm</h2>
        <label>Nome: <span class="lock-icon" title="Este campo não pode ser alterado"><i class="bi bi-lock-fill"></i></span></label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($adm['nome']); ?>" readonly><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($adm['email']); ?>" required><br>
        <label>CPF: <span class="lock-icon" title="Este campo não pode ser alterado"><i class="bi bi-lock-fill"></i></span></label><br>
        <input type="text" name="cpf" value="<?php echo htmlspecialchars($adm['cpf']); ?>" readonly><br>
        <label>Senha:</label><br>
        <input type="text" name="senha" value="<?php echo htmlspecialchars($adm['senha']); ?>" required><br>
        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?php echo htmlspecialchars($adm['telefone']); ?>" required><br>
        <label>Status:</label><br>
        <select name="status">
            <option value="ativo" <?php echo ($adm['status'] === 'ativo') ? 'selected' : ''; ?>>Ativo</option>
            <option value="inativo" <?php echo ($adm['status'] === 'inativo') ? 'selected' : ''; ?>>Inativo</option>
        </select><br>
        <label>Poder:</label><br>
        <select name="poder">
            <option value="9" <?php echo ($adm['poder'] === '9') ? 'selected' : ''; ?>>Sysop</option>
            <option value="8" <?php echo ($adm['poder'] === '8') ? 'selected' : ''; ?>>Gerente</option>
            <option value="7" <?php echo ($adm['poder'] === '7') ? 'selected' : ''; ?>>Supervisor</option>
            <option value="6" <?php echo ($adm['poder'] === '6') ? 'selected' : ''; ?>>Coordenador</option>
            <option value="5" <?php echo ($adm['poder'] === '5') ? 'selected' : ''; ?>>Analista</option>
            <option value="4" <?php echo ($adm['poder'] === '4') ? 'selected' : ''; ?>>Assistente</option>
            <option value="3" <?php echo ($adm['poder'] === '3') ? 'selected' : ''; ?>>Técnico</option>
            <option value="2" <?php echo ($adm['poder'] === '2') ? 'selected' : ''; ?>>Auxiliar</option>
            <option value="1" <?php echo ($adm['poder'] === '1') ? 'selected' : ''; ?>>Operador</option>
        </select><br><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</div>
</body>
</html>
