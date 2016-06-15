<?php
require_once '../../app/modelo/users.class.php';
$projects = Users::singleton();
if (isset($_POST["identi"]) && $_POST["nombres"])
{
$projects->insert_admin();
}
 $toma=$projects->boton_admin()
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <script type="text/javascript"> function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
</script> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGPI | Iniciar Sesión</title>

    <!-- Bootstrap core CSS -->

	
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/icheck/flat/green.css" rel="stylesheet">

	<link href="../css/estilos.css" rel="stylesheet">
	
	<script src="../js/jquery.min.js"></script>
    

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
            				<div>
                               <h1><img src="../images/logos/SIGPI-Logo.png" width="220" height="120"></h1>
							</div>
                <section class="login_content">
                
                    <form action="../../app/control/controlaccesopersonas.php" method="post" id="frmlogin">
                        <h1>Iniciar Sesión</h1>
                        <div class="col-md-12">
                            <input type="text" class="form-control has-feedback-left" name="innumero" id="numero" autocomplete="on" placeholder="Usuario" required/>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control has-feedback-left" name="incontrasena" id="Contraseña" placeholder="Contraseña" required/>
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div>
                        	<input type="submit" class="btn btn-default submit" name="Entrar" value="Ingresar" id="asignarEnviar" />
                            <a class="reset_pass" href="#">Perdió su contraseña?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
							
                            <p class="change_link">
                            <?php 
							if(empty($toma)){
								echo '<a href="#toregister" class="to_register">Crear Administrador</a> ';
								}else{}
	
				
				?>
                                
                            </p>
                            
                            <div align="center">
                            <?php
       //Mensaje para indicar que se asocio el instr a la ficha
		
		try{
			
		if (isset($_GET["m"]) and $_GET["m"]==1){
			echo '<div class="msj_inicio_nreg" align="center"> Usuario no registrado </div>';
		}	elseif(isset($_GET["m"]) and $_GET["m"]==2){
			echo '<div class="msj_inicio_sout" align="center"> Ha cerrado sesión </div>';
			} elseif( isset($_GET["m"]) and $_GET["m"]==3){
			echo '<div class="msj_inicio_acdn" align="center"> Acceso restringido, <br> debe iniciar su sesión </div>';
			}elseif( isset($_GET["m"]) and $_GET["m"]==4){
			echo '<div class="msj_inicio_read" align="center"> Administrador Registrado </div>';
			}
			else{}
			
			 } catch (PDOException $e) {
           $e->getMessage();
        }
  ?>
  </div>
                            <div class="clearfix"></div>
                            <br />
                            <p>2016 ADSI 811953 ©</p>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
            <div>
                               <h1><img src="../images/logos/SIGPI-Logo.png" width="220" height="120"></h1>
							</div>
                <section class="login_content">
                    <form method="post">
                        <h1>Resgistrarse</h1>
                        <span >Campos Obligatorios que contengan ( * ).</span><br>
                        <div> 
                         <input type="text" name="identi" class="form-control" maxlength="10" placeholder="Nº Documento   *" required onkeypress="return justNumbers(event);"/><div></div>
                        </div>
                        <div>
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres    *" required />
                        </div>
                        <div>
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos    *" required />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Correo Electronico    *" required />
                        </div>
                        <div> 
                         <select name="genero" class="form-control" align="justify">
                         <option value="No">Género   *</option>
                         <option value="FEMENINO">FEMENINO</option>
                         <option value="MASCULINO">MASCULINO</option>
                         </select>						
                        </div>
                        <div>
                                  <br>
                            <input type="text" name="celular" class="form-control" maxlength="10" placeholder="Nº Celular   *" onkeypress="return justNumbers(event);"/>
                        </div>
                            <div>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario   *"/>
                        </div>
                            <div>
                            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña   *" required />
                        </div>
                            <div>
                            <input type="text" name="perfil" class="form-control" placeholder="Profesión   *"/>
                        </div>


                        <div>
                            <input type="submit" class="btn btn-default" value="REGISTRARSE">
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">
                                <a href="#tologin" class="to_register"> iniciar sesion </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            
                                <p>2015 ADSI 811953 ©</p>
                           
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>