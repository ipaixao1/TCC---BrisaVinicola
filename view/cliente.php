<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header("Location: ../index.php");
    exit;
}
$cliente_nome = $_SESSION['cliente_nome'];

// Conectar ao banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=brisavinicola", "root", "");

// Obter os dados do cliente
$cliente_id = $_SESSION['cliente_id'];
$stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
$stmt->execute([$cliente_id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

// Obter o histórico de pedidos do cliente
// Obter o histórico de pedidos do cliente
$pedidos_stmt = $pdo->prepare("
    SELECT 
        p.id AS pedido_id, 
        p.data_pedido, 
        p.total, 
        p.metodo_pagamento, 
        GROUP_CONCAT(CONCAT(prod.nome, ' (', prod.quantidade, 'x)') SEPARATOR ', ') AS produtos 
    FROM pedidos_clientes p
    INNER JOIN pedido_produtos prod ON p.id = prod.pedido_id
    WHERE p.id = ?
    GROUP BY p.id
");
$pedidos_stmt->execute([$cliente_id]);
$pedidos = $pedidos_stmt->fetchAll(PDO::FETCH_ASSOC);


// Atualizar dados do cliente
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Atualizar dados no banco de dados (exceto CPF e nome)
    $update_stmt = $pdo->prepare("UPDATE cliente SET email = ?, telefone = ? WHERE id = ?");
    $update_stmt->execute([$email, $telefone, $cliente_id]);

    // Atualizar dados na variável de sessão
    $_SESSION['cliente_email'] = $email;
    $_SESSION['cliente_telefone'] = $telefone;

    // Redirecionar após atualização
    header("Location: cliente.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Área do Cliente</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=GFS+Didot&family=Pinyon+Script&family=Poppins:wght@200;300;400&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");

        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Cores principais */
        :root {
    --black: #0B0B0B;
    --black1: #000;
    --beige: #C0A788;
    --white: #1f2124;
    --white2: #d3d3d3;
  }

        body {
            background-color: var(--white);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 30px;
        }

        .container {
            background-color: var(--black);
            width: 80%;
            max-width: 1200px;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        /* Cabeçalho com ícone de perfil */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header a {
    margin: 0 10px;
    padding: 10px 20px;
    text-decoration: none;
    color: var(--white2);
    background-color: var(--black);
    border: 1px solid var(--beige);
    border-radius: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.header a:hover {
    background-color: var(--black);
    color: var(--white);
}

        .titulo h2 {
            font-size: 2.7rem;
            font-family: "Poppins", sans-serif;
            color: var(--white2);
        }

        .profile-icon {
            width: 50px;
            height: 50px;
            background-color: var(--beige);
            border-radius: 50%;
            color: var(--white2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-icon:hover {
            background-color: var(--white2);
        }

        /* Dados do Cliente */
        .cliente-info {
            margin-bottom: 40px;
        }

        .cliente-info h3 {
            font-size: 22px;
            color: var(--blue);
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group button {
            margin-top: 1rem;
            margin-left: 450px;
            display: inline-block;
            padding: 0.8rem 1.5rem; 
            color: var(--black);
            background: #C7B79E;
            cursor: pointer;
            border-radius: 20px;
            font-family: "Poppins", sans-serif;
            font-size: 1em; 
            font-weight: 600; 
            transition: 0.5s;
            border: none;
        }

        .form-group label {
            font-size: 1.1rem; 
            color: var(--beige); 
            font-family: "Poppins", sans-serif; 
            font-weight: 600; 
            margin-bottom: 0.5rem; 
            display: block;
            letter-spacing: 0.5px; 
            text-transform: capitalize; 
            margin-left: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 1rem 1.5rem; 
            border: 1px solid var(--blue);
            border-radius: 10px;
            background-color: var(--black1);
            color: var(--white2);
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: var(--magenta);
            outline: none;
        }

        .form-group button:hover {
            background-color: var(--white);
        }

        /* Histórico de Pedidos */
        .pedidos-info {
            margin-top: 40px;
        }

        .pedidos-info h3 {
            font-size: 2rem;
            font-family: "Poppins", sans-serif;
            color: var(--white2);
            margin-bottom: 30px;
        }

        .pedidos-info {
            margin: 2rem 0;
            font-family: "Poppins", sans-serif;
        }

        .pedidos-info table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border-radius: 15px; 
            overflow: hidden; 
            background-color: var(--black);
        }

        .pedidos-info table th,
        .pedidos-info table td {
            padding: 1rem;
            text-align: left;
        }

        .pedidos-info table th {
            background-color: var(--black);
            color: var(--beige);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1rem;
            border-bottom: 2px solid var(--black1);
        }

        .pedidos-info table td {
            background-color: var(--black1);
            color: var(--white2);
            font-size: 0.9rem;
            border-bottom: 1px solid var(--beige);
            transition: background-color 0.3s;
        }

        .pedidos-info table tr:nth-child(even) td {
            background-color: var(--black2); 
        }

        .pedidos-info table tr:hover td {
            background-color: var(--beige);
            color: var(--black1);
        }

        .pedidos-info table th:first-child,
        .pedidos-info table td:first-child {
            border-left: 0;
        }

        .pedidos-info table th:last-child,
        .pedidos-info table td:last-child {
            border-right: 0; 
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <a href="shop.php">Voltar para o Site</a>
        <a href="logout.php">Sair</a> 
          
            <div class="profile-icon" onclick="document.getElementById('clienteForm').style.display='block'">
                <span>👤</span>
            </div>
        </div>
        <div class="titulo">     
            <h2>Área do Cliente</h2>
            </div>

        <!-- Dados do Cliente -->
        <div class="cliente-info">
            <form action="cliente.php" method="POST" id="clienteForm" style="display:none;">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="editar">Salvar Alterações</button>
                </div>
            </form>
        </div>

        <!-- Histórico de Pedidos -->
        <div class="pedidos-info">
    <h3>Histórico de Compras</h3>
    <table>
        <tr>
            <th>ID do Pedido</th>
            <th>Produtos</th>
            <th>Valor</th>
            <th>Pagamento</th>
            <th>Data</th>
        </tr>
        <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?php echo $pedido['pedido_id']; ?></td>
                <td><?php echo $pedido['produtos']; ?></td>
                <td>R$ <?php echo number_format($pedido['total'], 2, ',', '.'); ?></td>
                <td><?php echo $pedido['metodo_pagamento']; ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($pedido['data_pedido'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>