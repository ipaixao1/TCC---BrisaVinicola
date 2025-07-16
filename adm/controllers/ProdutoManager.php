<?php
require dirname(__DIR__) . "/config/conexao.php";

class ProdutoManager {
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

    public function createProduto($nome, $preco, $descricao, $imagem, $status) {
        $sql = "INSERT INTO produtos (nome, preco, descricao, imagem, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdsss", $nome, $preco, $descricao, $imagem, $status);
        return $stmt->execute();
    }

    public function updateProdutoByID($id, $nome, $preco, $descricao, $imagem, $status) {
        $sql = "UPDATE produtos SET nome = ?, preco = ?, descricao = ?, imagem = ?, status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdsssi", $nome, $preco, $descricao, $imagem, $status, $id);
        return $stmt->execute();
    }

    public function deleteProdutoByID($id) {
        $sql = "SELECT imagem FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();

        if ($produto['imagem']) {
            unlink('../uploads/' . $produto['imagem']);
        }

        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getProdutoByID($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listProdutos() {
        $sql = "SELECT * FROM produtos";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
