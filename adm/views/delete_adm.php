<?php
require dirname(__DIR__) . "/controllers/admManager.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $manager = new admManager();
    $manager->deleteAdmByID($id);
    header("Location: admin_list.php");
}
?>
