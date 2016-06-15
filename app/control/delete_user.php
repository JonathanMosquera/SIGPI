<?php
if (!isset($_POST['id'])) {
    header("Location: ../");
} else {

    require_once '../modelo/users.class.php';

    $usuarios = Users::singleton();

    $id = $_POST['id'];
    $usuarios->delete_usuario($id);
}
?>