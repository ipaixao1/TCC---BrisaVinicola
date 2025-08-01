<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'brisavinicola';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta o total de pedidos
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM pedidos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retorna o total de pedidos como JSON
    echo json_encode(['total' => $result['total']]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()]);
}
?>
