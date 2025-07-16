<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM | Brisa Vinícola</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img_cart/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/adm.css">
    <link rel="stylesheet" href="css/perfil.css">
    <script src="perfil.js" defer></script>
     <!-- Bootstrap CSS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

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
    <a href="../../index.php"><img src="img_cart/logo_bv.png"  width="50"
        height="61" /></a>
    </div>
    <ul class="menu">
        <li  class="active">
            <a href="#">
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
            <a href="admin_produtos.php">
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
          <span class="ola"> Bem Vindo! </span>
            <h2>Dashboard</h2>
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
        <div class="cards">
            <div class="card">
                <div class="card-icon">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>
                <div class="card-info">
                    <h3>Total de Vendas</h3>
                    <p>R$ 50,000</p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="card-info">
                    <h3>Novos Clientes</h3>
                    <p>150</p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="card-info">
                    <h3>Administradores</h3>
                    <p>10</p>
                </div>
            </div>
        </div>



        <!--<div class="chart-container">
            <h3>Gráfico de Vendas</h3>
            <canvas id="salesChart"></canvas>
        </div>-->

        <!-- <div class="container">
        <h1 class="mt-5">Gráfico de Faturamento Diário</h1>
        <canvas id="faturamentoChart" width="400" height="200"></canvas>
    </div> -->



            </div>
        </div>
    </div>



</body>
</html>