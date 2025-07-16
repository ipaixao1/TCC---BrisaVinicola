<?php
require dirname(__DIR__) . "/controllers/ProdutoManager.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $manager = new ProdutoManager();
    $manager->deleteProdutoByID($id);
    header("Location: admin_produtos.php");
}
?>
