<?php

if (!isset($_POST['id'])) {
    header("Location: ../");
} else {

    require_once '../modelo/projects.class.php';

    $usuarios = Projects::singleton();

    $id = $_POST['id'];
    $usuarios->delete_project($id);
}
?>
