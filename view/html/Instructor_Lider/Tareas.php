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
    
	<link href="../../css/jquery-ui.css" rel="stylesheet">
	<link href="../../css/estilos.css" rel="stylesheet">
    <link href="../../css/TareasMain.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
	
    <link href="../../css/formulariocrearP.css" rel="stylesheet">

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
                                       
                                       
                                 <!--
                                
                                <li><a href="#"><i class="fa fa-list-alt"></i>GESTIONAR TAREAS<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                        </li>
                                        
                                        <li><a href="#">Crear Tarea</a></li>
                                        <li><a href="#">Consultar Tareas</a></li>
                                       
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
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
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
                   <div class="col-lg-9"> TAREAS DE PROYECCTO </div>
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
                                    
<!--                                    <button class="btn btn-default" id="jonaMA"></button>-->
                                    
            <div id="mainContainer">
                <div id="formTarea">
                    <form method="POST" action="#">
                        <label for="tarea">Nueva tarea:</label>
                        <input type="text" id="tarea" required>
                        <button type="submit" class="btn btn-round btn-primary">Agregar</button>
                    </form>
                </div>
                <div id="board">
                    <div class="tareaBoard a" style=" height:620px; overflow: scroll;">
                        <h1>Pendiente</h1>
                        <div class="tareaContainer">
                            
                        </div>
                    </div>
                    <div class="tareaBoard b" style=" height:620px; overflow: scroll;">
                        <h1>En ejecucion</h1>
                        <div class="tareaContainer">

                        </div>
                    </div>
                    <div class="tareaBoard c" style=" height:620px; overflow: scroll;">
                        <h1>Realizado</h1>
                        <div class="tareaContainer">

                        </div>
                    </div>
                </div>
           
                                    
                                    
                                    
                      <!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->
                        
<!----------------------------------------------------------------------------------------------------------------->
                                        
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
        </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
    
<script type="text/javascript"> function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}
</script> 

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
     <script src="../../js/TareasMain.js" type="text/javascript"></script>
     
    
</body>

</html>

<?php
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>