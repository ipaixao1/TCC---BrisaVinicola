<?php
require dirname(__DIR__) . "/controllers/ProdutoManager.php";

$manager = new ProdutoManager();
$produtos = $manager->listProdutos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos | ADM</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img_cart/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="../../view/css/shop.css">
    <link rel="stylesheet" href="css/adm.css">
    <link rel="stylesheet" href="css/perfil.css">
    <script src="perfil.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
    rel="stylesheet"
    href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script>
        // Função para perguntar se o usuário quer realmente sair
        function confirmarLogout() {
            var confirmacao = confirm("Tem certeza que deseja sair do sistema?");
            if (confirmacao) {
                window.location.href = 'logout.php'; // Redireciona para o logout se confirmado
            }
        }
    </script>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="img_cart/logo_bv.png"  width="50"
        height="61" />
    </div>
    <ul class="menu">
        <li>
            <a href="adm.php">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
        </a>
        </li>
        <li>
            <a href="admin_list.php">
            <i class="bi bi-person-lines-fill"></i>
                <span>Administradores</span>
        </a>
        </li>
        
        <li>
            <a href="cliente.php">
            <i class="bi bi-people-fill"></i>
                <span>Clientes</span>
        </a>
        </li>

        <li class="active">
            <a href="#">
            <i class="bi bi-bag-fill"></i>
                <span>Produtos</span>
        </a>
        </li>
        <li>
            <a href="graficos.php">
            <i class="bi bi-bar-chart-fill"></i>
                <span>Insights</span>
        </a>
        </li>
        <li>
            <a href="compra.php">
            <i class="bi bi-box2-fill"></i>
                <span>Compras</span>
        </a>
        </li>
        <li class="logout">
            <a href="logout.php" onclick="confirmarLogout()">
            <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
        </a>
        </li>
    </ul>
   </div>

    <div class="main--content">
        <div class="header--wrapper">
          <div class="header--title">
            <span>Bem Vindo!</span>
            <h2>Produtos</h2>
          </div>
          <div class="user--info">
            <div class="search--box">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Search">
          </div>
          <li>
          <i class="bi bi-person-circle"></i>
</li>
</div>
</div>

     <div class="table-container">
 <a href="add_produto.php" id="addAdminBtn">Adicionar Novo Produto</a>
 <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                <td>
                    <?php if ($produto['imagem']): ?>
                        <img src="../uploads/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Imagem do Produto" width="100">
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($produto['status']); ?></td>
                <td>
                    <a href="edit_produtos.php?id=<?php echo $produto['id']; ?>" class="edit-btn">Editar</a>
                    <form action="delete_produto.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                        <button class="delete-btn" type="submit" name="delete">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


                    </div>
                    </div>
                    
</body>
</html>
