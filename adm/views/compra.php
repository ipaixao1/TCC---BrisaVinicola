<?php
require dirname(__DIR__) . "/controllers/PedidoManager.php";

$manager = new PedidoManager();
$pedido = $manager->listPedidosClientes();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Compras | ADM</title>
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
        function confirmarLogout() {
            var confirmacao = confirm("Tem certeza que deseja sair do sistema?");
            if (confirmacao) {
                window.location.href = 'logout.php'; 
            }
        }
    </script>
</head>
<body>
<div class="sidebar">
    <div class="logo">
    <a href="../../index.php"><img src="img_cart/logo_bv.png"  width="50"
        height="61" /></a>
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
        <li>
            <a href="adm_produtos.php">
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
        <li class="active">
            <a href="#">
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
            <h2>Compras</h2>
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
     <table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Pagamento</th>
            <th>Envio</th>
            <th>Total</th>
            <th>Data do Pedido</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedido as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente['id']); ?></td>
            <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
            <td><?php echo htmlspecialchars($cliente['cpf']); ?></td>
            <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
            <td><?php echo htmlspecialchars($cliente['endereco']); ?></td>
            <td><?php echo htmlspecialchars($cliente['metodo_pagamento']); ?></td>
            <td><?php echo htmlspecialchars($cliente['metodo_envio']); ?></td>
            <td><?php echo htmlspecialchars($cliente['total']); ?></td>
            <td><?php echo htmlspecialchars($cliente['data_pedido']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



                    </div>
                    </div>
                    
</body>
</html>
