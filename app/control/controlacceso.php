<?php
require_once '../modelo/ConexionObj.php';

$tipodoc=$_POST['seltipodoc'];
$cedula=$_POST['innumero'];
$contrasena=$_POST['incontrasena'];

$db=new Conectar();		
$dbh=$db->conectarBD();
        
$consulta="select * from instructores where ins_tipo_doc=? 
                   and ins_cedula=? and ins_contrasena=?";
		
$stmt=$dbh->prepare($consulta);
$stmt->bindParam(1,$tipodoc);
$stmt->bindParam(2,$cedula);
$stmt->bindParam(3,$contrasena);
		
		
$stmt->execute();
$row = $stmt->fetch();
echo "registro ",$registro;

if ($row){  //si esta registrado

             //creo la sesion
             session_start();
			 $_SESSION['autenticado'] = true;

				$rol=$row["ins_rol"];
			    if($rol=="Instructor"){
			          header("location: ../vista/html/instructor/asistir.php");
			    }else if($rol=="Administrador"){
					  header("location: ../vista/html/crear_ficha.php");
			    }	
						
}else{
	//m=1 usuario no encontrado
	header("location: ../index.php?m=1");
}

?>