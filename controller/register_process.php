<?php
require '../adm/config/conexao.php';
require '../adm/controllers/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->getConnection();
    
    $user = new User($conn);
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($name, $cpf, $phone, $email, $password)) {
        header("Location: index.php?message=success");
        exit();
    } else {
        header("Location: index.php?message=error");
        exit();
    }
}
?>
