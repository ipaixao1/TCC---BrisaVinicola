<?php
require dirname(__DIR__) . "/config/conexao.php";

class endManager {
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

    public function createEnd($id_cliente, $cep, $estado, $cidade,$bairro,$rua,$numero,$bloco,$apto,$nome,$datahora,$status) {
        $sql = "INSERT INTO endereco (id_cliente, cep, estado, cidade,bairro,rua,numero,bloco,apto,nome,datahora,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdsss",$id_cliente, $cep, $estado, $cidade,$bairro,$rua,$numero,$bloco,$apto,$nome,$datahora,$status);
        return $stmt->execute();
    }


    public function deleteEndByID($id) {
        $sql = "SELECT nome FROM endereco WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        $sql = "DELETE FROM endereco WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getEndByID($id) {
        $sql = "SELECT * FROM endereco WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listEnd() {
        $sql = "SELECT * FROM endereco";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
