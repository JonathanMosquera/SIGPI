<?php
if (!isset($_POST['correo'])) {
    header("Location: ../");
} else {

    require_once '../modelo/users.class.php';

    $usuarios = Users::singleton();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
	$rol = $_POST['rol'];
    $correo = $_POST['correo'];
	$genero = $_POST['genero'];
    $celular = $_POST['celular'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
    $perfil = $_POST['perfil'];
	#$imgg = $_POST['imgg'];
	
    $usuarios->update_usuario($id,$nombre,$apellido,$rol,$correo,$genero,$celular,$usuario,$contrasena,$perfil);
}
?>