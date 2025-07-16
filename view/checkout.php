<?php 
require '../adm/config/conexao.php'; 

// Função para processar o checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $metodo_pagamento = $_POST['metodo_pagamento'];
    $metodo_envio = $_POST['metodo_envio'];
    $total = $_POST['total'];

    // Inserir dados no banco na tabela 'pedidos'
    $sql = "INSERT INTO pedidos_clientes (nome, email, cpf, telefone, endereco, metodo_pagamento, metodo_envio, total) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $nome, $email, $cpf, $telefone, $endereco, $metodo_pagamento, $metodo_envio, $total);

    if ($stmt->execute()) {
        // Recuperar o ID do pedido recém-criado
        $pedido_id = $conn->insert_id; // O ID do pedido inserido

        // Agora, registrar os itens do carrinho na tabela 'pedido_produtos'
        $cartItems = isset($_COOKIE['cartItems']) ? json_decode($_COOKIE['cartItems'], true) : []; // Verificando se existe o cookie 'cartItems' e atribuindo um array vazio se não existir

        if (empty($cartItems)) {
            echo "<script>alert('Seu carrinho está vazio.'); window.location = 'index.php';</script>";
            exit; // Se o carrinho estiver vazio, redireciona e encerra a execução
        }

        foreach ($cartItems as $item) {
            $produto_id = $item['id'];  // ID do produto
            $nome_produto = $item['title'];  // Nome do produto
            $quantidade = $item['quantity'];  // Quantidade do produto
            $preco = str_replace('R$', '', $item['price']);  // Preço do produto

            // Inserir o produto no pedido
            $sql_produto = "INSERT INTO pedido_produtos (pedido_id, produto_id, nome, quantidade, preco) 
                            VALUES (?, ?, ?, ?, ?)";
            $stmt_produto = $conn->prepare($sql_produto);
            $stmt_produto->bind_param("iissd", $pedido_id, $produto_id, $nome_produto, $quantidade, $preco);

            $stmt_produto->execute();
        }

        
// Após o sucesso do pedido
echo "<script>alert('Pedido realizado com sucesso!'); window.location = 'historico.php?pedido_id=$pedido_id';</script>";
    } else {
        echo "<script>alert('Erro ao realizar o pedido. Tente novamente.');</script>";
    }
}

$cliente_id = $_SESSION['cliente_id'] ?? null;

if ($cliente_id) {
    $sql = "SELECT nome, email, cpf, telefone FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cliente_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cliente = $result->fetch_assoc();
} else {
    $cliente = [
        'nome' => '',
        'email' => '',
        'cpf' => '',
        'telefone' => ''
    ]; // Caso o cliente não esteja logado, valores padrão
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Checkout</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    
    <section id="checkout">        
        <div class="cart-summary">
            <a href="shop.php" class="btn-voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
            
            <h2>Itens no Carrinho:</h2>
            <ul>
                <?php
                $cartItems = isset($_COOKIE['cartItems']) ? json_decode($_COOKIE['cartItems'], true) : [];
                
                if (empty($cartItems)) {
                    echo "<li>Seu carrinho está vazio.</li>";
                } else {
                    $total = 0;
                    foreach ($cartItems as $item) {
                        $total += floatval(str_replace('R$', '', $item['price'])) * $item['quantity'];
                        echo "<li>{$item['title']} - {$item['quantity']} x R$ {$item['price']}</li>";
                    }
                    echo "<p>Total: R$ " . number_format($total, 2, ',', '.') . "</p>";
                }
                ?>
            </ul>
        </div>

        <form method="POST" action="checkout.php">
    <input type="hidden" name="total" value="<?php echo number_format($total, 2, ',', '.'); ?>">

    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($cliente['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($cliente['email'], ENT_QUOTES, 'UTF-8'); ?>" required>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cliente['cpf'], ENT_QUOTES, 'UTF-8'); ?>" required>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone'], ENT_QUOTES, 'UTF-8'); ?>" required>

    <label for="endereco">Endereço de Entrega:</label>
    <input type="text" id="endereco" name="endereco" required>
    <small style="color: gray; font-size: 0.9rem;">
        Exemplo: Rua das Flores, 123, Apto 45, Bairro Jardim, São Paulo - SP, CEP 01234-567
    </small>

    <label for="metodo_pagamento">Método de Pagamento:</label>
    <select id="metodo_pagamento" name="metodo_pagamento" required>
        <option value="cartao_credito">Cartão de Crédito</option>
        <option value="PIX">PIX</option>
        <option value="boleto">Boleto Bancário</option>
    </select>

    <label for="metodo_envio">Método de Envio:</label>
    <select id="metodo_envio" name="metodo_envio" required>
        <option value="sedex">SEDEX</option>
        <option value="pac">PAC</option>
    </select>

    <button type="submit">Finalizar Compra</button>
</form>

    </section>
</body>
</html>




