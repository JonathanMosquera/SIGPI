<?php

if (!isset($_POST['id'])) {
    header("Location: ../");
} else {

    require_once '../modelo/projects.class.php';

    $usuarios = Projects::singleton();

    $id = $_POST['id'];
	$di = $_POST['id'];
	$de = $_POST['id'];
	$do = $_POST['id'];
    $usuarios->delete_projectgestor($id,$di,$de,$do);
}
?>