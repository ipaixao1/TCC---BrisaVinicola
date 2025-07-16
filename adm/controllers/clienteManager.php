<?php
require dirname(__DIR__) . "/config/conexao.php";

class clienteManager {
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

    public function createCliente($nome, $email, $cpf, $senha,$telefone,$status) {
        $sql = "INSERT INTO cliente (nome, email, senha, telefone, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdsss", $nome, $email, $cpf, $senha,$telefone,$status);
        return $stmt->execute();
    }


    public function deleteClienteByID($id) {
        $sql = "SELECT nome FROM cliente WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        $sql = "DELETE FROM cliente WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getClienteByID($id) {
        $sql = "SELECT * FROM cliente WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listCliente() {
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
