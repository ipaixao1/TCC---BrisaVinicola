<?php
require dirname(__DIR__) . "../config/conexao.php";

class PedidoManager {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function createPedidos($cliente, $endereco, $valor, $pagamento, $datahora, $status) {
        $sql = "INSERT INTO pedidos (id_cliente, endereco, valor, pagamento, datahora, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdsss", $cliente, $endereco, $valor, $pagamento, $datahora, $status);
        return $stmt->execute();
    }

    public function deletePedidosByID($ID_PEDIDO) {
        $sql = "DELETE FROM pedidos WHERE ID_PEDIDO = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ID_PEDIDO);
        return $stmt->execute();
    }

    public function getPedidosByID($ID_PEDIDO) {
        $sql = "SELECT * FROM pedidos WHERE ID_PEDIDO = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ID_PEDIDO);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listPedidos() {
        $sql = "SELECT * FROM pedidos";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function listPedidosClientes() {
        $sql = "SELECT * FROM pedidos_clientes";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}

    
?>