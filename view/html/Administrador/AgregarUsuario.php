<?php
require_once '../../../app/modelo/users.class.php';

$objpersonal = users::singleton();


session_start();
//si la sesion esta creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="ADMINISTRADOR") {
$id = $_SESSION['jona']['identi'];
$personalid = $objpersonal->personalPorId($id);
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

    <link href="../../css/dataTables.bootstrap.css" rel="stylesheet">

<link href="../../css/bootstrap.min.css" rel="stylesheet">

<link href="../../fonts/css/font-awesome.min.css" rel="stylesheet">
<link href="../../css/animate.min.css" rel="stylesheet">


<!-- Custom styling plus plugins -->

<link href="../../css/custom.css" rel="stylesheet">
<link href="../../css/icheck/flat/green.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">

<script src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.min.js.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>

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
<div class="div_logo"><p><img src="../../images/logos/Logo-Sena2.png"width="160px" height="65px" id="lg-sena" title="Servicio Nacional de Aprendizaje"></p></div>
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
<img src="<?php foreach ($personalid as $row){ echo $row['Per_Foto'];} ?>" alt="..." class="img-circle profile_img">
</div>
<div class="profile_info">
<span>Bienvenido(a),</span>
<h2><?php 
		foreach ($personalid as $row){echo $row ['Per_Nombre']." ";
	echo $row ['Per_Apellido'];}?></h2>
</div>
</div>
<!-- /menu prile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

<div class="menu_section">
<h3><?php  foreach ($personalid as $row){echo $row ['Per_Rol']."(A)";}?></h3>
<ul class="nav side-menu">

<!--<li><a><i class="fa fa-suitcase"></i> GESTIONAR PROYECTOS <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="CrearProyecto.html">Crear Proyecto</a>
</li>
<li><a href="ConsultarProyectos.php">Consultar Proyecto</a>
</li>
</ul>
</li> -->

<li><a href="AgregarUsuario.php"><i class="fa fa-users"></i> GESTIÓN DE USUARIOS</a>
<!--<ul class="nav child_menu">
<!--EN MEDIO DE ESTAS ETIQUETAS VAN LOS SUBMENUS-->

<!--EN MEDIO DE ESTAS ETIQUETAS VAN LOS SUBMENUS-
</ul>
</li>-->

<!--<li><a><i class="fa fa-list-alt"></i> GESTIONAR TAREAS <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<!--EN MEDIO DE ESTAS ETIQUETAS VAN LOS SUBMENUS-->

<!--EN MEDIO DE ESTAS ETIQUETAS VAN LOS SUBMENUS
</ul>
</li>-->                
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
<a href="ayudaadministrador.php"><i class="fa fa-question pull-right"></i>Ayuda</a>
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
GESTIÓN DE USUARIOS
<small>
<!--TEXTO PEQUEÑO-->
</small>
</h3>
</div>
</div>
<div class="clearfix"></div>

<div class="row">

<div class="col-md-12">
<div class="x_panel">
<div class="x_content">

<!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->
       <p><br/></p>
    <div class="container">
      
	    <p><br/></p>
	    <div class="panel panel-default ">
	      <div class="panel-body ">                 

<?php

          $personal = $objpersonal->personal();
		  foreach ($personal as $row){}
?>
<p>  
     <div class="btnagrega" id="agregar"><button type="button" id="<?=$row['Per_Id']?>" class="agregar btn btn-primary btn-md" aria-hidden="true" ><span class="glyphicon glyphicon-plus"></span> Agregar</button><br/></div>
</p>
<div class="table-responsive">
<table id="ghatable" class="display table table-bordered table-stripe table-condensed table-responsive responsive-utilities jambo_table bulk_action" cellspacing="0" width="100%">
     <thead>
          <tr  bgcolor="#2a3f54">
               <th style="color:#FFF">IDENTIFICACION</th>
               <th style="color:#FFF">NOMBRE</th>
               <th style="color:#FFF">APELLIDO</th>
               <th style="color:#FFF">ROL</th>
               <th style="color:#FFF">CORREO</th>
               <th style="color:#FFF">GENERO</th>
               <th style="color:#FFF">CELULAR</th>
               <th style="color:#FFF">USUARIO</th>
               <th style="color:#FFF">CONTRASEÑA</th>
               <th style="color:#FFF">PERFIL</th>
               <th style="color: #3BC777">MODIFICAR</th>
               <th style="color: red">ELIMINAR</th>
          </tr>
     </thead>
     <tbody>
          <?php
          if(sizeof($personal) > 0){
               foreach ($personal as $row){
                    ?>
                    <tr>
                         <td><div class="grid_2" id="identificacion<?=$row['Per_Id']?>"><?php echo $row['Per_Id'] ?></div></td>
                         <td><div class="grid_2" id="nombre<?=$row['Per_Id']?>"><?php echo $row['Per_Nombre'] ?></div></td>
                         <td><div class="grid_2" id="apellido<?=$row['Per_Id']?>"><?php echo $row['Per_Apellido'] ?></div></td>
                         <td><div class="grid_2" id="rol<?=$row['Per_Id']?>"><?php echo $row['Per_Rol'] ?></div></td>
                         <td><div class="grid_2" id="correo<?=$row['Per_Id']?>"><?php echo $row['Per_Correo'] ?></div></td>
                         <td><div class="grid_2" id="genero<?=$row['Per_Id']?>"><?php echo $row['Per_Genero'] ?></div></td>
                         <td><div class="grid_2" id="celular<?=$row['Per_Id']?>"><?php echo $row['Per_Celular'] ?></div></td>
                         <td><div class="grid_2" id="usuario<?=$row['Per_Id']?>"><?php echo $row['Per_Usuario'] ?></div></td>
                         <td><div class="grid_2" id="contrasena<?=$row['Per_Id']?>"><?php echo $row['Per_Contrasena'] ?></div></td>
                         <td><div class="grid_2" id="perfil<?=$row['Per_Id']?>"><?php echo $row['Per_Perfil'] ?></div></td>
                         <td><div class="grid_2" id="editar"><button type="button"  value=" Editar" id="<?=$row['Per_Id']?>" class="editar btn btn-round btn-success"><span class="glyphicon glyphicon-pencil"></span></button></div></td>
                         <td>
                              <div class="grid_2" id="eliminar"><button type="button" value="x" id="<?=$row['Per_Id']?>" class="eliminar btn btn-round btn-danger"><span class="glyphicon glyphicon-trash"></span></button></div></td>
                    </tr>
                    <?php
               }
          }
          ?>
     </tbody>
</table>	    
             </div>    
                 </div>
	    </div>
	    
    </div>
<!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->


</div>
</div>
</div>
</div>
</div>
</div>



<!-- footer content -->
<footer>
<div class="">
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

<script src="../../js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="../../js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="../../js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="../../js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="../../js/icheck/icheck.min.js"></script>
<script src="../../js/custom.js"></script>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	  $('#ghatable').dataTable();
	});
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
</body>

</html>
<?php
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>