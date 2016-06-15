<?php
require_once '../../../app/modelo/users.class.php';
$projects = Users::singleton();

if (isset($_POST['identificacion']) && $_POST["grabar"]=="si")
{
	$projects->editar_perfil();
	exit;	
}
if (isset($_POST['identifica']) && $_POST["grabaras"]=="si")
{
	$projects->subir_foto();
	exit;	
}
if (isset($_POST['identi']) && $_POST["eli_foto"]=="si")
{
	$projects->eliminar_foto();
	exit;	
}

session_start();
//si la sesion creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="SUBDIRECTOR") {
$id = $_SESSION['jona']['identi'];
$personalid = $projects->personalPorId($id);	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Gestion de Proyectos de Investigación | </title>    
    
    <link href="../../css/pegajoso.css" rel="stylesheet">    
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.min.css">
	<link href="../../css/estilos.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/icheck/flat/green.css" rel="stylesheet">
    
    <!--ESTILOS PARA VENTANAS EMERGENTES-->
    <link href="../../css/emergentes.css" rel="stylesheet">  
    
    <!--ESTILOS PARA ACORDEON-->
	<link rel="stylesheet" href="../../css/jquery-ui.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-sm" onLoad="function finicio()">


    <div class="container body">
	
    <div>
    <div class="nav_menu2">
    <div class="div_logo"><p><img src="../../images/logos/Logo-Sena2.png" width="160px" height="65px" id="lg-sena" title="Servicio Nacional de Aprendizaje"></p></div>
    <div class="div_logo2 navbar-right"><p align="right"><img src="../../images/logos/SIGPI-Logo1.png" width="160px" height="70px" title="Sistema Integrado de Gestión de Proyectos de Investigación"></p></div>
    </div>
    
</div>
     


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php foreach ($personalid as $row){echo $row ['Per_Foto'];} ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido(a),</span>
                            <h2>
                            <?php 
								foreach ($personalid as $row){echo $row ['Per_Nombre']." ";
	echo $row ['Per_Apellido'];}
							?>
                            </h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3><?php  echo $row['Per_Rol'];?></h3>
                            <ul class="nav side-menu">
                                
                                <li><a href="ConsultarProyectos.php"><i class="fa fa-suitcase"></i> CONSULTAR PROYECTOS </a>
                                    <!--<ul class="nav child_menu">
                                        </li>
                                        
                                        <li><a href="ConsultarProyectos.php">Consultar Proyecto</a>
                                        </li>
                                       
                                    </ul>-->
                                </li>                                
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
 
                    <nav class="" role="navigation">
                        <div class="nav toggle">        
                                <button class="c-hamburger c-hamburger--htla" id="menu_toggle">
                                  <span>toggle menu</span>
                                </button>
                             </div>
                        
                        <ul class="nav navbar-nav navbar-right">
                        
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php foreach ($personalid as $row){echo $row ['Per_Foto'];} ?>" alt=""><?php 
										foreach ($personalid as $row){echo $row ['Per_Nombre']." ";
	echo $row ['Per_Apellido'];}?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="EditarPerfil.php"><i class="fa fa-user pull-right"></i>  Perfil</a>
                                    </li>
                                    <li>
                                        <a href="ayudasubdirector.php"><i class="fa fa-question pull-right"></i>Ayuda</a>
                                    </li>
                                    <li><a href="../../../app/control/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    PERFIL
                    <small>
                        <!--TEXTO PEQUEÑO-->
                    </small>
                </h3>
               
            
                        </div>
                    </div>
                    <div class="clearfix"><a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></a></div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content" align="center">

									<!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->
                                    
                                    <div class="form_perfil" align="center">                       
                                    
                                    
                                    <div id="accordion">
                                        <h3><span class="glyphicon glyphicon-user"></span> Credenciales</h3>
                                        <div>
                                        
                                        <?php foreach ($personalid as $row){?>
                                        <table width="100%">
                                        <tr>
                                        <td width="50%">
                                        
                                        <div style="" align="center"><?php echo '<img src="'.$row['Per_Foto'].'"width="50%" height="50%" " class="img-rounded"'; ?></div>
                                        <br>
                                        <br>
                                        <br>
                                        <div align="center">

                                        <form name="form3" action="" method="post">
                                        <input type="hidden" name="eli_foto" value="si"/>
                                    	<input type="hidden" name="identi" value="<?php echo $row['Per_Id']; ?>"/>                  
                                    	<button type="submit" title="Eliminar foto actual" class="btn btn-round btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar foto actual</button>
                                        </form>
                                        </div>  
                                        </td>
                                        <td>
                                        <h3>
										<?php 
											echo $row['Per_Nombre'];
											echo " ";
											echo $row['Per_Apellido'];
										 ?>                                         
                                        </h3>
                                        <small>
                                        <?php 											
											echo '<i class=\'fa fa-briefcase user-profile-icon\'></i> '.$row['Per_Rol']."(A)";
											echo "<br>";
											echo '<i class=\'fa fa-graduation-cap user-profile-icon\'></i> '.$row['Per_Perfil'];
											echo "<br>";
											echo "<br>";
											echo '<i class=\'fa fa-at user-profile-icon\'></i> '.$row['Per_Usuario'];
}
										?> 
                                        </small>                                        
                                        </td>
                                        </tr>
                                        </table>
                                        
                                         </div>
                                         
                                        <h3><span class="glyphicon glyphicon-picture"></span> Editar Foto de Perfil</h3>
                                        <div>
                                        <form name="form2" action="" method="post" enctype="multipart/form-data">
                                        <table class="table table-striped responsive-utilities">
                                    
                                    <tbody>
                                    <?php foreach ($personalid as $row){?>
                                     <tr>                                   
                                            <td align="center">
                                            Foto de Perfil:
                                            </td>
                                            <td align="center">
                                             <input type="file" name="foto" required onchange="control(this)">
                                            <script type="text/javascript">
     
    function control(f){
    var ext=['jpg','png'];
    var a=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==a)
            return
    }
    var t=f.cloneNode(false);
    t.value='';
    f.parentNode.replaceChild(t,f);
    $("<div>porfavor cargar solo archivos jpg o png.</div>").dialog({
            resizable:false,
            title:'Archivos.',
            height:100,
            width:300,
            modal:true});;}
			
	</script>
                                            </td>
                                        </tr>
                                        
                  					<input type="hidden" name="grabaras" value="si"/>
                                    <input type="hidden" name="identifica" value="<?php  echo $row['Per_Id'];} ?>"/>                  
                                    <tr>
                                    	<td align="center" colspan="2"><button type="submit" title="Guardar" class="btn btn-round btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                       </td>
                                    </tr>
                                        </tbody>
                                        </table>
                                        </form>
                                        </div>
                                        
                                        
                                        <h3><span class="glyphicon glyphicon-edit"></span> Editar Perfil</h3>
                                        <div>
                                     <form name="form" action="" method="post" >   
                                        
                                    
                                   <table class="table table-striped responsive-utilities">
                                    
                                    <tbody>
       <?php foreach ($personalid as $row){?>
                                        <tr>
                                    	<td align="center">Nombre:</td>
                                        <td align="center"><input type="text" name="nombre" value="<?php echo $row['Per_Nombre']; ?>" class="form-control col-md-7 col-xs-12" required></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Apellido:</td>
                                        <td align="center"><input type="text" name="apellido" value="<?php echo $row['Per_Apellido'];?>" class="form-control col-md-7 col-xs-12" required></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Rol:</td>
                                        <td align="center"><input type="text" name="rol" value="<?php echo  $row['Per_Rol']; ?>" class="form-control col-md-7 col-xs-12" required disabled></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Correo:</td>
                                        <td align="center"><input type="email" name="correo" value="<?php echo  $row['Per_Correo']; ?>" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo@gmail.com" required></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Genero:</td>
                                        <td align="center"> <select required name='genero' class="form-control col-md-7 col-xs-12" id='genero' >
                            <option value='<?php echo  $row['Per_Genero']; ?>'><?php echo  $row['Per_Genero']; ?></option> 
                            <option value='FEMENINO'>FEMENINO</option>
                             <option value='MASCULINO'>MASCULINO</option>
                    
                             </select></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Celular:</td>
                                        <td align="center"><input type="text" name="celular" value="<?php echo  $row['Per_Celular']; ?>" class="form-control col-md-7 col-xs-12" maxlength="10" required onkeypress="return justNumbers(event);" ></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Usuario:</td>
                                        <td align="center"><input type="text" name="usuario" value="<?php echo $row['Per_Usuario']; ?>" class="form-control col-md-7 col-xs-12" required></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Contraseña:</td>
                                        <td align="center"><input type="text" name="contrasena" value="<?php echo $row['Per_Contrasena']; ?>" class="form-control col-md-7 col-xs-12"></td>
                                    </tr>
                                    <tr>
                                    	<td align="center">Profesión:</td>
                                        <td align="center"><input type="text" name="perfil" value="<?php echo $row['Per_Perfil']; ?>" class="form-control col-md-7 col-xs-12"></td>
                                    </tr>
                                    
                  					<input type="hidden" name="grabar" value="si"/>
                                    <input type="hidden" name="identificacion" value="<?php echo $fe = $_SESSION['jona']['identi']; }?>"/>                  
                                    <tr>
                                    	<td align="center" colspan="2"><button type="submit" title="Guardar" class="btn btn-round btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                       </td>
                                    </tr>
                                    </tbody>                                    
                                    
                                    </table>                                    </form>
                                        
                                        </div>						
                                    </div>
                                    
                                    </div>                                    
									
                                	<!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->

                                        
                                    </div>
                                </div>
                               
                            
                  <div class="modal fade" id="meumodal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Datos Actualizados</h4>
</div>
<div class="modal-body">
<p>Sus datos personales han sido editados exitosamente.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="meumodal2">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Datos Actualizados</h4>
</div>
<div class="modal-body">
<p>La foto ha sido editada exitosamente.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="meumodal3">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Datos Actualizados</h4>
</div>
<div class="modal-body">
<p>Tu foto se ha eliminado correctamente.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
                           
                

                <!-- footer content -->
                <footer>
                    <div class="pie">
                        <p class="pull-right">(Sistema Integrado de Gestión de Proyectos de Invetigación) a Bootstrap 3 template by <a>Kimlabs</a>. |
                            <span class="lead"> <img src="../../images/logos/SIGPI-Logo.png" width="80px" height="40px" title="Sistema Integrado de Gestión de Proyectos de Investigación"></span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>   
     
</body>
	

	

	<script src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.min.js.js"></script>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script>

<!-- PNotify -->
    <script type="text/javascript" src="../../js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="../../js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="../../js/notify/pnotify.nonblock.js"></script>


    <script src="../../js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="../../js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="../../js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../../js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="../../js/icheck/icheck.min.js"></script>
    <script src="../../js/custom.js"></script>  
    
    <!--SCRIPTS PARA ACORDEON-->
	<!-- Librería jQuery -->
		<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
		<!-- Plugin jQUeryUI -->
		<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>		
		<!-- Ejecutamos el código -->
		<script type="text/javascript">
		$('document').ready(function() {
			$('#tabs').tabs();
			$('#accordion').accordion({
				collapsible: true,
				heightStyle: "content",
			});
		});
		</script>
          <?php

  if (isset($_GET["m"]) and ($_GET["m"])==2)
  {
	  ?>
          <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Datos Actualizados.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Sus datos personales han sido editados exitosamente.</b></div>',
                                type: 'success'
                            });
//$("#meumodal").modal("show");
});
</script>
<?php
}else if (isset($_GET["m"]) and ($_GET["m"])==1)
{
	?>
    <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Datos Actualizados.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>La foto ha sido editada exitosamente.</b></div>',
                                type: 'success'
                            });
//$("#meumodal2").modal("show");
});
</script>
	<?php 
}else if (isset($_GET["m"]) and ($_GET["m"])==3)
{
?>
    <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Datos Actualizados.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Tu foto se ha eliminado correctamente.</b></div>',
                                type: 'success'
                            });
//$("#meumodal3").modal("show");
});
</script>
	<?php 
}
?>
<script type="text/javascript"> function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
</script> 
 <script>
  (function() {

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

  })();
</script>
</html>
<?php
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>