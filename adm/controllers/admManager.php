<?php
require dirname(__DIR__) . "/config/conexao.php";

class admManager {
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

    public function loginAdm($email, $senha) {
        // SQL para selecionar o administrador com base no email
        $sql = "SELECT * FROM adm WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email); // Bind apenas o email, pois estamos filtrando por ele
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Verifica se o administrador foi encontrado
        if ($result->num_rows > 0) {
            $adm = $result->fetch_assoc();
    
            // Verifica se a senha está correta
            if (password_verify($senha, $adm['senha'])) {
                // Se a senha estiver correta, você pode armazenar informações do adm na sessão, por exemplo
                $_SESSION['adm_id'] = $adm['id']; // Assumindo que há um campo 'id' na tabela
                $_SESSION['adm_nome'] = $adm['nome']; // E você também pode armazenar o nome, se desejar
                
                return true; // Login bem-sucedido
            } else {
                return false; // Senha incorreta
            }
        } else {
            return false; // Email não encontrado
        }
       
    }
    

    public function createAdm($nome, $email, $cpf, $senha,$telefone,$status,$poder) {
        $sql = "INSERT INTO adm (nome, email,cpf, senha, telefone, status, poder) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $nome, $email, $cpf, $senha,$telefone,$status,$poder);
        return $stmt->execute();
    }

    public function updateAdmByID($id, $nome, $email, $cpf, $senha,$telefone,$status,$poder) {
        $sql = "UPDATE adm SET nome = ?, email = ?, cpf = ?, senha = ?, telefone = ?, status = ?,poder = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssi", $nome, $email, $cpf, $senha,$telefone,$status,$poder, $id);
        return $stmt->execute();
    }

    public function deleteAdmByID($id) {
        $sql = "SELECT nome FROM adm WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $adm  = $result->fetch_assoc();
        $sql = "DELETE FROM adm WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getAdmByID($id) {
        $sql = "SELECT * FROM adm WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function listAdm() {
        $sql = "SELECT * FROM adm";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
