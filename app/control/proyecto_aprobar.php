<?php

if (!isset($_POST['id'])) {
    header("Location: ../");
} else {

    require_once '../modelo/projects.class.php';

    $usuarios = Projects::singleton();

    $id = $_POST['id'];
    $usuarios->aprobar_proyectos($id);
}
?>
