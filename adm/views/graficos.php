<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Insights | ADM</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img_cart/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/adm.css">
    <script src="perfil.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
    rel="stylesheet"
    href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <li>
            <a href="admin_produtos.php">
            <i class="bi bi-bag-fill"></i>
                <span>Produtos</span>
        </a>
        </li>
        <li class="active">
            <a href="#">
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
            <h2>Insights</h2>
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
        <body>
    <div class="main--content">
        <h1 class="header--title">Gráfico de Produtos</h1>
        <div class="chart-container">
            <canvas id="productChart"></canvas>
        </div>
    </div>

    <script>
        let productCounts = [];
        let timestamps = [];

        const ctx = document.getElementById('productChart').getContext('2d');
        const productChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: timestamps, // Horários das atualizações
                datasets: [{
                    label: 'Total de Produtos',
                    data: productCounts,
                    borderColor: '#C0A788',
                    backgroundColor: 'rgba(192, 167, 136, 0.5)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#d3d3d3'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    },
                    y: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    }
                }
            }
        });

        // Função para buscar dados do servidor
        function fetchProductCount() {
            fetch('../config/get_total_products.php') 
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    // Atualiza os dados do gráfico
                    const now = new Date().toLocaleTimeString();
                    timestamps.push(now);
                    productCounts.push(data.total);

                    productChart.update();
                })
                .catch(error => console.error('Erro ao buscar dados:', error));
        }

        // Busca inicial e atualização a cada 5 segundos
        fetchProductCount();
        setInterval(fetchProductCount, 5000);
    </script>

<div class="main--content">
        <h1 class="header--title">Gráfico de Clientes</h1>
        <div class="chart-container">
            <canvas id="clientChart"></canvas>
        </div>
    </div>

    <script>
        let clientCounts = [];
        let clientTimestamps = [];

        const clientCtx = document.getElementById('clientChart').getContext('2d');
        const clientChart = new Chart(clientCtx, {
            type: 'line',
            data: {
                labels: clientTimestamps, // Horários das atualizações
                datasets: [{
                    label: 'Total de Clientes',
                    data: clientCounts,
                    borderColor: '#C0A788',
                    backgroundColor: 'rgba(192, 167, 136, 0.5)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#d3d3d3'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    },
                    y: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    }
                }
            }
        });

        // Função para buscar o total de clientes do servidor
        function fetchClientCount() {
            fetch('../config/get_total_clients.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    // Atualiza os dados do gráfico
                    const now = new Date().toLocaleTimeString();
                    clientTimestamps.push(now);
                    clientCounts.push(data.total);

                    clientChart.update();
                })
                .catch(error => console.error('Erro ao buscar dados:', error));
        }

        // Busca inicial e atualização a cada 5 segundos
        fetchClientCount();
        setInterval(fetchClientCount, 5000);
    </script>

<div class="main--content">
        <h1 class="header--title">Gráfico de Pedidos</h1>
        <div class="chart-container">
            <canvas id="orderChart"></canvas>
        </div>
    </div>

    <script>
        let orderCounts = [];
        let orderTimestamps = [];

        const orderCtx = document.getElementById('orderChart').getContext('2d');
        const orderChart = new Chart(orderCtx, {
            type: 'line',
            data: {
                labels: orderTimestamps, // Horários das atualizações
                datasets: [{
                    label: 'Total de Pedidos',
                    data: orderCounts,
                    borderColor: '#C0A788',
                    backgroundColor: 'rgba(192, 167, 136, 0.5)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#d3d3d3'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    },
                    y: {
                        ticks: { color: '#d3d3d3' },
                        grid: { color: 'rgba(211, 211, 211, 0.2)' }
                    }
                }
            }
        });

        // Função para buscar o total de pedidos do servidor
        function fetchOrderCount() {
            fetch('../config/get_total_orders.php') // Substitua pelo caminho correto do arquivo PHP
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    // Atualiza os dados do gráfico
                    const now = new Date().toLocaleTimeString();
                    orderTimestamps.push(now);
                    orderCounts.push(data.total);

                    orderChart.update();
                })
                .catch(error => console.error('Erro ao buscar dados:', error));
        }

        // Busca inicial e atualização a cada 5 segundos
        fetchOrderCount();
        setInterval(fetchOrderCount, 5000);
    </script>

</body>
</html>