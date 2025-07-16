<?php
require '../adm/config/conexao.php';

if (!isset($_GET['pedido_id'])) {
    echo "<script>alert('ID do pedido não encontrado.'); window.location = 'index.php';</script>";
    exit;
}

$pedido_id = intval($_GET['pedido_id']);

// Buscar os dados do pedido
$sql_pedido = "SELECT * FROM pedidos_clientes WHERE id = ?";
$stmt_pedido = $conn->prepare($sql_pedido);
$stmt_pedido->bind_param("i", $pedido_id);
$stmt_pedido->execute();
$result_pedido = $stmt_pedido->get_result();

if ($result_pedido->num_rows === 0) {
    echo "<script>alert('Pedido não encontrado.'); window.location = 'index.php';</script>";
    exit;
}

$pedido = $result_pedido->fetch_assoc();

// Buscar os produtos do pedido
$sql_produtos = "SELECT * FROM pedido_produtos WHERE pedido_id = ?";
$stmt_produtos = $conn->prepare($sql_produtos);
$stmt_produtos->bind_param("i", $pedido_id);
$stmt_produtos->execute();
$result_produtos = $stmt_produtos->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo do Pedido</title>
    <link rel="stylesheet" href="css/historico.css">
</head>
<body>
<section id="resumo">
    <h1>Informações do Pedido</h1>

    <!-- Tabela de Dados do Cliente -->
    <table>
        <tbody>
            <tr>
                <td><strong>Nome:</strong></td>
                <td><?php echo htmlspecialchars($pedido['nome']); ?></td>
            </tr>
            <tr>
                <td><strong>E-mail:</strong></td>
                <td><?php echo htmlspecialchars($pedido['email']); ?></td>
            </tr>
            <tr>
                <td><strong>CPF:</strong></td>
                <td><?php echo htmlspecialchars($pedido['cpf']); ?></td>
            </tr>
            <tr>
                <td><strong>Telefone:</strong></td>
                <td><?php echo htmlspecialchars($pedido['telefone']); ?></td>
            </tr>
            <tr>
                <td><strong>Endereço:</strong></td>
                <td><?php echo htmlspecialchars($pedido['endereco']); ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Tabela de Detalhes do Pedido -->
    <table class="table-produto">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_pedido = 0;
            while ($produto = $result_produtos->fetch_assoc()) {
                $subtotal = $produto['quantidade'] * $produto['preco'];
                $total_pedido += $subtotal;
                echo "<tr>
                        <td>{$produto['nome']}</td>
                        <td>{$produto['quantidade']}</td>
                        <td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>
                        <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                    </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: left;"><strong>Total:</strong></td>
                <td><strong>R$ <?php echo number_format($total_pedido, 2, ',', '.'); ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Exibição da Data -->
    <div class="data-pedido">
        <p>Data do Pedido: <?php echo date("d/m/Y H:i:s", strtotime($pedido['data_pedido'])); ?></p>
    </div>

    <!-- Botão para voltar à loja -->
    <a href="../index.php" class="btn-voltar">Voltar à loja</a>
</section>

</body>
</html>
