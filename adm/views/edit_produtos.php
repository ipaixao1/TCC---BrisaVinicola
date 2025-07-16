<?php
require dirname(__DIR__) . "/controllers/ProdutoManager.php";

$manager = new ProdutoManager();
$id = $_GET['id'];
$produto = $manager->getProdutoByID($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $imagem = $produto['imagem'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        if ($imagem) {
            unlink('../uploads/' . $imagem);
        }
        $imagem = basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], "../uploads/" . $imagem);
    }

    $manager->updateProdutoByID($id, $nome, $preco, $descricao, $imagem, $status);
    header("Location: admin_produtos.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
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
  body{
    background-color: var(--white);
    margin:0;
  }
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: var(--white);
        }


        .login-form {
            background-color: var(--black);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 700px;
            display: flex;
            flex-direction: column;
            margin-left: 550px;
        }

        .login-form h2 {
            text-align: center;
            color: var(--beige);
            margin-bottom: 20px;
        }

        .login-form label {
            margin-bottom: 5px;
            color: var(--white2);
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--black1);
            border-radius: 5px;
            background-color: var(--black1);
        }
        .login-form textarea{
            background-color: var(--black1);
            color: var(--beige);
            border-color: var(--black1);
        }
        .login-form option{
            background-color: var(--black1);
            color: var(--beige);
            border-color: var(--black1);
        }
        .login-form select{
            background-color: var(--black1);
            color: var(--beige);
            border-color: var(--black1);
        }

        .login-form button {
            padding: 10px;
            background-color: var(--black1);
            color: var(--beige);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: var(--beige);
            color: var(--black);
        }
        .login-form input{
            background-color: var(--black1);
            color: var(--beige);
            border-color: var(--black1);
        }
    </style>
</head>
<body>
<div class="login-container">
    <form class="login-form"  method="POST" enctype="multipart/form-data">
    <h2>Editar Produto</h2>
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br>
        <label>Preço:</label><br>
        <input type="text" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required><br>
        <label>Descrição:</label><br>
        <textarea name="descricao" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea><br>
        <label>Imagem Atual:</label><br>
        <?php if ($produto['imagem']): ?>
            <img src="../uploads/<?php echo $produto['imagem']; ?>" alt="Imagem do Produto" width="100"><br>
        <?php endif; ?>
        <label>Alterar Imagem:</label><br>
        <input type="file" name="imagem"><br>
        <label>Status:</label><br>
        <select name="status">
            <option value="ativo" <?php echo ($produto['status'] === 'ativo') ? 'selected' : ''; ?>>Ativo</option>
            <option value="inativo" <?php echo ($produto['status'] === 'inativo') ? 'selected' : ''; ?>>Inativo</option>
        </select><br><br>
        <button type="submit">Salvar Alterações</button>
    </form>
    </div>
</body>
</html>
