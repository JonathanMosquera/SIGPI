
<?php
require_once '../modelo/ConexionObj.php';

$usuario=$_POST['innumero'];
$contrasena=$_POST['incontrasena'];

$db=new Conectar();		
$dbh=$db->conectarBD();
        
$consulta="select * from personas where Per_Usuario=? 
                   and Per_Contrasena=?";
		
$stmt=$dbh->prepare($consulta);
$stmt->bindParam(1,$usuario);
$stmt->bindParam(2,$contrasena);

				
$stmt->execute();
$row = $stmt->fetch();
$ide=$row["Per_Id"];
$nom =$row["Per_Nombre"];
$ape =$row["Per_Apellido"];
$rol=$row["Per_Rol"];
$mail=$row["Per_Correo"];
$gen=$row["Per_Genero"];
$cel=$row["Per_Celular"];
$usu=$row["Per_Usuario"];
$pass=$row["Per_Contrasena"];
$per=$row["Per_Perfil"];
$pict=$row["Per_Foto"];

$sessionArray = array(
'identi' => $ide,
'usuU' => $nom,
'apellido' => $ape,
'rol' => $rol,
'email' => $mail,
'genero' => $gen,
'celular' => $cel,
'usuario' => $usu,
'contrasena' => $pass,
'perfil' => $per,
'foto' => $pict,
);
if ($row){  //si esta registrado

             //creo la sesion
             session_start();
			 $_SESSION['autenticado'] = true;

				$rol=$row["Per_Rol"];
			    if($rol=="GESTOR"){
					 $_SESSION["jona"]=$sessionArray;
			          header("location: ../../view/html/Gestor_Proyectos/ConsultarProyectos.php");
					  
					  
			    }else if($rol=="INSTRUCTOR"){
					$_SESSION["jona"]=$sessionArray;
					  header("location: ../../view/html/Instructor_Lider/ConsultarProyectos.php");
			    }	
				else if($rol=="ADMINISTRADOR"){
					 $_SESSION["jona"]=$sessionArray;
					  header("location: ../../view/html/Administrador/AgregarUsuario.php");
			    }
				else if($rol=="COORDINADOR"){
					 $_SESSION["jona"]=$sessionArray;
					  header("location: ../../view/html/Coordinador/ConsultarProyectos.php");
			    }
				else if($rol=="SUBDIRECTOR"){
					 $_SESSION["jona"]=$sessionArray;
					  header("location: ../../view/html/Subdirector/ConsultarProyectos.php");
			    }	
				else if($rol=="LIDER SENNOVA"){
					 $_SESSION["jona"]=$sessionArray;
					  header("location: ../../view/html/Lider_Sennova/ConsultarProyectos.php");
			    }
						
}else{
	//m=1 usuario no encontrado
	header("location: ../../view/html/Inicio_Sesion.php?m=1");
}

?>
