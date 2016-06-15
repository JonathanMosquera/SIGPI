<?php
require_once '../../../app/modelo/projects.class.php';
$projects = projects::singleton();
$data = $projects->listar_proyectos();


session_start();
//si la sesion esta creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="GESTOR") {
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
                                
                                <li><a  href="ConsultarProyectos.php"><i class="fa fa-suitcase"></i> CONSULTAR PROYECTOS </a>
                                   <!-- <ul class="nav child_menu">
                                        </li>
                                        
                                        <li><a href="ConsultarProyectos.php">Consultar Proyecto</a>
                                        </li>
                                       
                                    </ul>-->
                                </li>
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
                                     <img src="<?php echo $row['Per_Foto']; ?>" alt=""><?php 
										echo $row['Per_Nombre']." ";
	echo $row['Per_Apellido'];}?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="EditarPerfil.php"><i class="fa fa-user pull-right"></i>  Perfil</a>
                                    </li>
                                    <li>
                                        <a href="ayudagestor.php"><i class="fa fa-question pull-right"></i>Ayuda</a>
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
<div align="center">                              
                                            <button class="btn btn-default source" onclick="new PNotify({
                                title: '¿Que indican los colores?',
                                text: '<div class=\'color bg-orange\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>Pendientes</b></div><br><br><div class=\'color bg-green\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>Aprobados</b></div><br><br><div class=\'color bg-red\' style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'>Proyectos <b>No Aprobados</b></div>',
                                type: 'info'
                            });"><span class="glyphicon glyphicon-info-sign"></span> Información de Colores</button><button class="btn btn-default source" id="reporte"><i class="fa fa-file-pdf-o"></i> Reporte de Proyectos</button>
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
               <th style="color:#FFF">APROBACION GESTOR</th>
               <th style="color:#FFF">APROBACION SENNOVA</th>
          </tr>
     </thead>
     <tbody>
     <?php $gerencia_color = array(
    'No Aprobado' => '#FFC1C0',
    'Aprobado' => '#B4E8A7',
	'Pendiente' => '#FFF99D'
);




?>
          <?php
          if(sizeof($data) > 0){
               foreach ($data as $row){
                    ?>
                    <tr  style="background-color: <?php if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="No Aprobado"){ echo  $gerencia_color["No Aprobado"];}else if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="Aprobado"){ echo  $gerencia_color["Aprobado"];}else if($row['Pro_Condicion']=="Aprobado" and $row['Pro_CondicionDos']=="Pendiente"){ echo  $gerencia_color["Aprobado"];}else {echo $gerencia_color["Pendiente"]; ;}?>"  onclick="window.location.href='InfoProyecto.php?m=<?php echo $row['Pro_Codigo'];?>'">
                         <td><div class="grid_2" id="nombre<?=$row['Pro_Codigo']?>"><a href="InfoProyecto.php?m=<?php echo $row['Pro_Codigo'];?>"><u><?php echo $row['Pro_Nombre'] ?></u><i class="fa fa-eye pull-right"></i></a></div></td>
                         <td><div class="grid_2" id="descripcion<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Fase'] ?></div></td>
                         <td><div class="grid_2" id="intervalo<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Intervalo'] ?></div></td>
                         <td><div class="grid_2" id="presupuesto<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Presupuesto'] ?></div></td>
                         <td><div class="grid_2" id="ficha<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Ficha'] ?></div></td>
                         <td><div class="grid_2" id="centro<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Centro'] ?></div></td>
                         <td><div class="grid_2" id="condicion<?=$row['Pro_Codigo']?>"><?php echo $row['Pro_Condicion'] ?></div></td>
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
                                                           <div class="modal fade" id="meumodal">
<div class="modal-dialog">
<div class="modal-content">
<form class="form-horizontal text-left" role="form" method="post" action="Reportes.php?m=2" target="_blank">
<div class="modal-header">
<h4 class="modal-title">Generar Reporte en PDF</h4> 
</div>
<div align="center" class="modal-body">
 <div class="table-responsive">        
            <div class="form-group">
                <label class="col-lg-2 control-label left">Fase:</label>
                    <div class="col-lg-10">
                          <select name='fase' class="form-control" id='fase' >
                            <option value=''>Seleccione</option> 
                            <option value='Inicio'>Inicio</option>
                             <option value='Ejecucion'>Ejecución</option>
                             </select>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Condición:</label>
                    <div class="col-lg-10">
                        <select name='condicion' class="form-control" id='condicion' >
                            <option value=''>Seleccione</option> 
                            <option value='Aprobado'>Aprobado</option>
                             <option value='Pendiente'>Pendiente</option>
                             <option value='No Aprobado'>No Aprobado</option>
                             </select>
                    </div>
                    
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Intervalo:</label>
                    <div class="col-lg-10">
                        <select  name='inter' class="form-control" id='inter' >
                            <option value=''>Seleccione</option> 
                            <option value='Largo Plazo'>Largo Plazo</option>
                             <option value='Mediano Plazo'>Mediano Plazo</option>
                             <option value='Corto Plazo'>Corto Plazo</option>
                             </select>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Centro:</label>
                    <div class="col-lg-10">
                      <select  name='Centro' class='form-control' id='Centro' >
                        <option value=''>Seleccione</option> 
                        <option value='CTPI'>Centro de Teleinformatica y Producción Industrial</option>
                         <option value='CCS'>Centro de Comercio y Servivios</option>
                         <option value='CA'>Centro Agropecuario</option>
                         </select>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Presupuesto:</label>
                    <div class="col-lg-10"><br>
                        Desde <input type="text"  name='presue' class='form-control' id='presue' onkeypress="return justNumbers(event);" value="0"> Hasta <input type="text"  name='presued' class='form-control' id='presued' onkeypress="return justNumbers(event);"  > 
                    </div>
               
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Ficha:</label>
                    <div class="col-lg-10">
                        <input type="text"  name='ficha' class='form-control' id='ficha' onkeypress="return justNumbers(event);" >
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Fechas:</label>
                    <div class="col-lg-10"><br>
                     Desde <input type="date"  name='fechaini' class='form-control' id='fechaini' > Hasta <input type="date"  name='fechafin' class='form-control' id='fechafin'  >
                        
                    </div>
            </div>
            
                <!--fin prueba boton file-->       
      </div>
   
</div>
<div class="modal-footer">  
<a target="_blank" href="Reportes.php?m=1"  class="btn btn-round btn-info"><span class="glyphicon glyphicon-export"></span>Generar Reporte Total</a><a><button type="submit" class="btn btn-round btn-success"><span class="glyphicon glyphicon-export"></span> Generar Reporte</button></a></form>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
                

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
    <!--<script src="js/jquery-2.1.4.js"></script>
     <script src="js/main.js"></script>-->
     
      <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	  $('#ghatable').dataTable();
	});
    </script>
    <script type="text/javascript">
$(document).ready(function () {
    //editamos datos del usuario
    $("#reporte").on('click', function () {
$("#meumodal").modal("show");
});
});
</script>
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
<?php 
	foreach ($data as $jona){
		  
		  if($jona['Pro_Condicion']=="Aprobado" and $jona['Pro_CondicionDos']=="No Aprobado"){
			  
			  $cont = $cont +1;
                    ?>
               
                    <?php }}
					if($cont>0){
					?>
                     <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Notificación',
                                text: 'Tienes <?php echo $cont ;?> proyectos por eliminar. ',
                                type: 'error',
                               
                            });

//$("#meumodal2").modal("show");
});</script>
<?php }foreach ($data as $jonat){	
    if($jonat['Pro_CondicionDos']=="Pendiente"){
		
		$cont = $cont + 1;
?>
<?php }}

if($cont>0){
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Notificación.',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Tiene <?php echo $cont;?> proyectos pendientes por revisar.</b></div>',
                                type: 'danger'
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