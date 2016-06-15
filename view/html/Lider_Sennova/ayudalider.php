<?php
require_once '../../../app/modelo/users.class.php';
$projects = Users::singleton();

session_start();
//si la sesion creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="LIDER SENNOVA") {
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


<link href="../../css/fancibox/jquery.fancybox.css" rel="stylesheet">

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
                            <h3><?php  echo $row['Per_Rol']."(A)";?></h3>
                            <ul class="nav side-menu">
                                
                                <li><a href="ConsultarProyectos.php"><i class="fa fa-suitcase"></i> CONSULTAR PROYECTOS </a>
                                   <!-- <ul class="nav child_menu">
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
                                        <a href="ayudalider.php"><i class="fa fa-question pull-right"></i>Ayuda</a>
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
                    AYUDA
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
                                    
                                    <div class="form_perfil">                       
                                    
                                    
                                    <div id="accordion" align="center">
                                        <h2><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Perfil</h2>
                                        <div>
										
                                        <!--iniciamos con ayuda 1-->
<ul class="galeria">
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/editar perfil/editar perfil.png" title="pasar a editar perfil" ><img src="../../images/ayuda/f - lider senova/editar perfil/pequeña/editar perfil.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/1 - eliminar foto.png" title="eliminar foto de perfil" ><img src="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/pequeñas/1 - eliminar foto.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/2 - editar foto.png" title="editar foto de perfil" ><img src="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/pequeñas/2 - editar foto.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/3 - editar informacion.png" title="editar informacion personal" ><img src="../../images/ayuda/A - EDITAR_PERFIL PARA TODOS/pequeñas/3 - editar informacion.png" /></a> 
</li>
</ul>
                                        <!--fin de ayuda 1-->
                                        
                                         </div>
                                         
                                        <h2><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Consultar Proyecto</h2>
                                        <div>
                                       
                                        <!--iniciamos con ayuda 2-->
<div class="col-lg-12">
<div class="col-lg-4">
<ul class="galeria">
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/consultar/consultar.png" title="primer informacion de consultar proyecto" ><img src="../../images/ayuda/f - lider senova/consultar/pequeñas/consultar.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/consultar/consultar1.png" title="segunda informacion de consultar proyecto"><img src="../../images/ayuda/f - lider senova/consultar/pequeñas/consultar1.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/consultar/consultar2.png" title="segunda informacion de consultar proyecto"><img src="../../images/ayuda/f - lider senova/consultar/pequeñas/consultar2.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/consultar/reporte1.png" title="reportes"><img src="../../images/ayuda/f - lider senova/consultar/pequeñas/reporte1.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/consultar/reporte2.png" title="reportes"><img src="../../images/ayuda/f - lider senova/consultar/pequeñas/reporte2.png" /></a> 
</li>
</ul>
</div>
<div class="col-lg-4"></div>
</div>

                                       <!--fin de ayuda 1-->
                                       
                                        </div>
                                        
                                        
                                        <h2><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Informacion del proyecto</h2>
                                        <div>
                                        <!--iniciamos con ayuda 2-->
<div class="col-lg-12">
<div class="col-lg-4">
<ul class="galeria">
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/infoproyecto/info.png" title="detalles del proyecto" ><img src="../../images/ayuda/f - lider senova/infoproyecto/pequeñas/info.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/infoproyecto/info1.png" title="miembros del proyecto"><img src="../../images/ayuda/f - lider senova/infoproyecto/pequeñas/info1.png" /></a> 
</li>
<li>
<a class ="fancybox" rel="group" href="../../images/ayuda/f - lider senova/infoproyecto/info2.png" title="descargar presentacion power point"><img src="../../images/ayuda/f - lider senova/infoproyecto/pequeñas/info2.png"/></a> 
</li>
</ul>
</div>
<div class="col-lg-4"></div>
</div>

                                       <!--fin de ayuda 1-->
                                        
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
        <script type="text/javascript" src="../../js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript">

$(document).ready(function() {
    $(".fancybox").fancybox();
});

</script>
<style>
.galeria
{
width:70em;
margin: 0 auto;
}
.galeria li
{
	list-style-type:none;
	float:none;
	display:inline-block;
	margin:1em;
}
h1{text-align:center;}
</style>
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