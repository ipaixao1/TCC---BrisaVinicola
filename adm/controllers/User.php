<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $cpf, $phone, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO cliente (nome, cpf, celular, email, senha) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $cpf, $phone, $email, $hashedPassword);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
}
?>
