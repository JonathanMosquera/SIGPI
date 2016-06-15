<?php
if (!isset($_POST['correo'])) {
    header("Location: ../");
} else {

    require_once '../../app/modelo/users.class.php';

    $usuarios = Users::singleton();

    $identificacion = $_POST['iden'];
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
    $usuarios->insert_usuario($identificacion,$nombre,$apellido,$rol,$correo,$genero,$celular,$usuario,$contrasena,$perfil);
}
?>