<?php
require_once '../../../app/modelo/projects.class.php';
$projects = projects::singleton();


session_start();
//si la sesion esta creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="INSTRUCTOR") {
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
    <link href="../../css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/icheck/flat/green.css" rel="stylesheet">
    
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
                            <img src="<?php foreach ($personalid as $row){ echo $row['Per_Foto']; ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido(a), </span>
                            <h2><?php 
										echo $row['Per_Nombre']." ";
	echo $row['Per_Apellido'];
									?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3><?php  echo $row['Per_Rol']."(A)";?></h3>
                            <ul class="nav side-menu">
                                
                                <li><a href="ConsultarProyectos.php"><i class="fa fa-suitcase"></i> CONSULTAR MIS PROYECTOS </a>
                                   </li>
                                        <li><a href="Crear_Proyecto.php"><i class="fa fa-plus"></i>CREAR PROYECTO</a>
                                        </li>
                                       
                                       
                                 
                                
                               <!-- <li><a href="Tareas.php"><i class="fa fa-list-alt"></i>GESTIONAR TAREAS<span class="fa fa-chevron-down"></span></a>-->
                              <!--  <ul class="nav child_menu">
                                        </li>
                                        
                                        <li><a href="#">Crear Tarea</a></li>
                                        <li><a href="#">Consultar Tareas</a></li>
                                       
                                    </ul>
                                  </li>   -->                           
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
                            <div class="nav toggle">        
                                <button class="c-hamburger c-hamburger--htla" id="menu_toggle">
                                  <span>toggle menu</span>
                                </button>
                             </div>
                        </div>
                        
                        <ul class="nav navbar-nav navbar-right">
                        
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                     <img src="<?php echo $row['Per_Foto']; ?>" alt=""><?php 
										echo $row['Per_Nombre']." ";
	echo $row['Per_Apellido'];}?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="EditarPerfil.php"><i class="fa fa-user pull-right"></i>  Perfil</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="fa fa-question pull-right"></i>Ayuda</a>
                                    </li>
                                    <li><a href="../../../app/control/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a>
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
                    CONSULTAR PROYECTOS 
                    <small>
                        <!--TEXTO PEQUEÑO-->
                    </small>
                     </h3>
           
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content">

									<!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->
                                    
                                
<!---------------------------------------------------------------------------------------------------------------------------->   
<div align="center">                              
                                            <button class="btn btn-default source" onclick="new PNotify({
                                title: '¿Que indican los colores?',
                                text: '<div class=\'color bg-orange\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>Pendientes</b></div><br><br><div class=\'color bg-green\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>Aprobados</b></div><br><br><div class=\'color bg-red\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>No Aprobados</b></div>',
                                type: 'info'
                            });"><span class="glyphicon glyphicon-info-sign"></span> Información de Colores</button>
</div>               

<table id="ghatable" class="display table table-bordered table-stripe table-condensed table-responsive responsive-utilities jambo_table bulk_action" cellspacing="0" width="100%">
     <thead>
          <tr  bgcolor="#2a3f54">
               <th style="color:#FFF">NOMBRE</th>
               <th style="color:#FFF">FASE</th>
               <th style="color:#FFF">INTERVALO</th>
               <th style="color:#FFF">PRESUPUESTO</th>
               <th style="color:#FFF">FICHA</th>
               <th style="color:#FFF">CENTRO</th>
               <th style="color:#FFF">CONDICION</th>
          </tr>
     </thead>
     <tbody>
     
     <?php $gerencia_color = array(
    'No Aprobado' => '#FFC1C0',
    'Aprobado' => '#B4E8A7',
	'Pendiente' => '#FFF99D'
); ?>
          <?php
		  $identificacion = $_SESSION['jona']['identi'];
		  $data = $projects->proyectos_instructor($identificacion);
		  			
          if(sizeof($data) > 0){
               foreach ($data as $row){
				   ?>
                    
                    <tr  style="background-color: <?php if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="No Aprobado"){ echo  $gerencia_color["No Aprobado"]; ?><?php }else if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="Aprobado"){ echo  $gerencia_color["Aprobado"];}else if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="Pendiente"){ echo  $gerencia_color["Pendiente"];}else {echo $gerencia_color["Pendiente"]; ;}?>"  onclick="window.location.href='InfoProyecto.php?m=<?php echo $row['Pro_Codigo'];?>'">
                         <td><div class="grid_2" id="nombre<?=$row['Pro_Codigo']?>"><a href="InfoProyecto.php?m=<?php echo $row['Pro_Codigo'];?>"><u><?php echo $row['Pro_Nombre'] ?></u><i class="fa fa-eye pull-right"></i></a></div></td>
                         <td><div class="grid_2" id="descripcion<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Fase'] ?></div></td>
                         <td><div class="grid_2" id="intervalo<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Intervalo'] ?></div></td>
                         <td><div class="grid_2" id="presupuesto<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Presupuesto'] ?></div></td>
                         <td><div class="grid_2" id="ficha<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Ficha'] ?></div></td>
                         <td><div class="grid_2" id="centro<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Centro'] ?></div></td>
                         <td><div class="grid_2" id="condicion<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_CondicionDos'] ?></div></td>
                         
                    </tr>
                    <?php
               }
          }
          ?>
     </tbody>
</table>	    
              

                                                  
									
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
    <script src="js/jquery-2.1.4.js"></script>
     <script src="js/main.js"></script>
     
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

    
    <?php
if (isset($_GET["m"]) and ($_GET["m"])==1)
{
	?>
    <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Tus Proyectos',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Tu Proyecto se ha creado exitosamente.</b></div>',
                                type: 'dark'
                            });

//$("#meumodal2").modal("show");
});
</script>
    <?php }$cont=0;
	foreach ($data as $jonat){	
    if($jonat['Pro_Condicion']=="Aprobado" && $jonat['Pro_CondicionDos']=="Aprobado"){
		
		$cont = $cont +1;
  }}
  
  if($cont > 0){
  ?>
<script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Tus Proyectos.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b><?php echo $cont;?> de tus proyectos ya han sido aprobados.</b></div>',
                                type: 'success'
                            });
});
</script>
<?php }
$contdos=0;
	foreach ($data as $jona){
		  
		  if($jona['Pro_Condicion']=="Aprobado" and $jona['Pro_CondicionDos']=="No Aprobado"){
                  
				  $contdos = $contdos +1;
				   } }
				   
				   if($contdos > 0){
				   ?>
                   
                   
                    <script type="text/javascript">
					$(document).ready(function()
{
	new PNotify({
                                title: 'Notificación.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Pasado un tiempo <?php echo $contdos;?> de tus proyectos seran eliminados.</b></div>',
                                type: 'error'
                            });
});
</script>
   
</body>

</html>

<?php }
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>