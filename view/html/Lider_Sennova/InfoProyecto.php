<?php
require_once '../../../app/modelo/projects.class.php';

$projects = projects::singleton();
$projects->insert_comment();


  $nom = $_REQUEST["m"];
  $si = $_REQUEST["m"];
   $pdf = $projects->archivo_pdfs($si);
   $archivopower= $projects->archivo_pptx($si);
  $datos = $projects->info_Proyecto($nom);
  $detes = $projects->informacion_Proyecto($nom);
  $dutos = $projects->responsable_Proyecto($nom);
  $ditos = $projects->miembros_Proyecto($nom);
  $detos = $projects->boton_AprobarLider($nom);
  $dotos = $projects->boton_NoAprobarLider($nom);
  $comentarios = $projects->view_comentarios($nom);
					 
session_start();
//si la sesion esta creada
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
    <link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css">


    <!-- Bootstrap core CSS -->

    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/icheck/flat/green.css" rel="stylesheet">
    
	<script src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.min.js.js"></script>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    
    <script type="text/javascript" src="../../js/funcionesDos.js"></script>

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
<div class="div_logo2 navbar-right"><p align="right"><a href="Inicio.php"><img src="../../images/logos/SIGPI-Logo1.png" width="160px" height="70px" title="Sistema Integrado de Gestión de Proyectos de Investigación"></a></p></div>
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
                            <span>Bienvenido(a),</span>
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
                            <h3><?php  echo $row['Per_Rol'];?></h3>
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
                                     <img src="<?php echo $row['Per_Foto']; ?>" alt=""><?php 
										echo $row['Per_Nombre']." ";
	echo $row['Per_Apellido'];}?>
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
                    INFORMACIÓN DEL PROYECTO
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
                                                                        
									<div class="row">
                                    
                                <div align="center"> <table class="table table-striped responsive-utilities" width="100%">
                                
                                  	<tr>       
                                       <th colspan="2" align="center">
                                       <?php
										foreach ($datos as $dt):  
										?>
                                       <h1><strong><?php echo $dt['Pro_Nombre'];?></strong></h1>
                                       <small>
                        <!--TEXTO PEQUEÑO-->
                    </small>
                            			<?php
												endforeach;                               
										?>                    
                                       </th>                                                                                  
                                    </tr>
                                    
                                    
                                    <tr> 
                                    <td width="45%">
                                    
                                    <div class="info_proy" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class=""><a href="#tab_content1" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="false">Información</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Miembros del Proyecto</a>
                                            </li>
                                            <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="home-tab" data-toggle="tab"  aria-expanded="true">Comentarios</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="profile-tab">
                                            <table class="table table-striped">
                                            <?php
foreach ($detes as $dt):
?>
                       <tr>
                       	   <td width="200px"><b>CODIGO:</b></td>
                           <td><?php echo $dt['Pro_Codigo'];?></td>                        
                       </tr>
                       <tr>
                       	   <td><b>NOMBRE:</b></td>                       		
                           <td><div class="grid_2" id="nombro<?=$dt['Pro_Codigo']?>"><?php echo $dt['Pro_Nombre'] ?></div></td>
                       </tr>
                       </tr>
                       <tr>
                       	   <td><b>DESCRIPCIÓN:</b></td>                       		
                           <td><?php echo $dt['Pro_Descripcion'];?></td>
                           <?php endforeach;?>
                       </tr>
                       <tr>
                        <?php
foreach ($dutos as $dt):
?>
                       	   <td><b>RESPONSABLE:</b></td>                       		
                           <td><?php echo $dt['Per_Nombre']." ".$dt['Per_Apellido'];?></td>
                           <?php endforeach;?>
                       </tr>
                       <tr>
                        <?php
foreach ($detes as $dt):
?>
                       	   <td><b>JUSTIFICACIÓN:</b></td>                       		
                           <td><?php echo $dt['Pro_Justificacion'];?></td>
                       </tr>
                       <tr>
                       	   <td><b>PRESUPUESTO:</b></td>                       		
                           <td><?php echo $dt['Pro_Presupuesto'];?></td>
                       </tr>
                       <tr>
                       	   <td><b>FICHA:</b></td>                       		
                           <td><?php echo $dt['Pro_Ficha'];?></td>
                       </tr>  
                       <tr>
                       	   <td><b>CENTRO:</b></td>                       		
                           <td><?php echo $dt['Pro_Centro'];?></td>
                       </tr>  
                       <tr>
                       	   <td><b>CONDICIÓN:</b></td>                       		
                           <td><?php echo $dt['Pro_CondicionDos'];?></td>
                       </tr>
                       <tr>
                       	   <td><b>FECHA INICIO:</b></td>                       		
                           <td><?php echo $dt['Pro_Fecha_Inicio'];?></td>
                       </tr> 
                       <tr>
                       	   <td><b>FECHA FIN:</b></td>                       		
                           <td><?php echo $dt['Pro_Fecha_Fin'];?></td>
                       </tr> 
                       <tr>
                       	   <td><b>CLASIFICACIÓN:</b></td>                       		
                           <td><?php echo $dt['Pro_Clasificacion'];?></td>
                       </tr> 
                       <tr>
                       	   <td><b>FASE:</b></td>                       		
                           <td><?php echo $dt['Pro_Fase'];?></td>
                       </tr>                       
<?php
	endforeach;
?>
                                            </table>                                                                  
                                            </div>
                                            
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                            
                                            
                                            <table class="table table-striped">
                                            <?php
foreach ($dutos as $cc):
?>
                       <tr>
                       <td width="200px"><b>RESPONSABLE:</b></td>
                           <td><ul class="nav navbar-nav navbar-center">
                        
                            <li class=""><a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $cc['Per_Nombre']." ".$cc['Per_Apellido']." ";?><span class=" fa fa-angle-down"></span>
                                </a> <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><br>&nbsp;&nbsp;&nbsp;&nbsp;CELULAR:</li>
                      				<li> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cc['Per_Celular'];?></li>
                                    <li><br>&nbsp;&nbsp;&nbsp;&nbsp;CORREO:</li>
                                   <li> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cc['Per_Correo'];?><br><br></li>
                                    </ul></li></ul>   </td>
 
                     
 <?php
	endforeach;
?>
                                       
                       </tr>
                       <tr>
                       	  <td width="200px"><b>MIEMBROS DEL PROYECTO:</b></td>
                          <td></td>
                       </tr>
                       <tr>
                           <?php
foreach ($ditos as $lol):
?>    	        		   <td></td>
                           <td><?php echo $lol['Per_Nombre']." ".$lol['Per_Apellido'];?></td>
                 
                       </tr>

                                              
<?php
	endforeach;
?>
                                            </table>
                                            
                                            
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="home-tab">
                                             <div class="x_panel" style=" height:620px; overflow: scroll;">
        <div class="x_title">
            <h2> Comentarios </h2>
            
            <div class="clearfix"></div>
        </div>
            <div class="x_content" >
                <ul class="list-unstyled msg_list">
                <?php if(empty($comentarios)){?>
					
					<img src="../../images/logos/SIGPI-Logo.png" width="100%">
                    
					<?php }else{?>
                <?php foreach ($comentarios as $comm): ?>
                                                      
                <li>
                    <a>
                        <span class="image"><img src="<?php echo $comm['Per_Foto']; ?>" alt="img" /></span>
                        <span>
                            <span><?php echo $comm['Per_Nombre']." ".$comm['Per_Apellido']." <small>(".$comm['Per_Rol'].")</small>"; ?></span>
                            <span class="time"><?php echo $comm['fecha']; ?></span>
                        </span>
                                                                
                        <span class="message" style="font-size:14px;  word-wrap: break-word; width:87%;"> <?php echo $comm['Com_Comentarios']; ?> </span>
                    </a>
                </li>   
                <?php endforeach;} ?>
                                                    
                </ul>
            </div>
            </div> 
            <form method="post" name="form" id="form">
            <div class="input-group">
            <input type="text" class="form-control"  name="comentar" id="comentar" required >
            <span class="input-group-btn">
            <button class="btn btn-primary" id="submit" title="comentar">Comentar</button>
            </span>
            </div>
            <?php foreach ($detes as $dt): ?>
            <input type="hidden" name="codigoproyecto" id="codigoproyecto" value="<?php echo $dt['Pro_Codigo'];?>" >
            <?php endforeach; ?>
            <?php foreach ($personalid as $dt): ?>
            <input type="hidden" name="usuarioco" id="usuarioco" value="<?php echo $dt['Per_Id'];?>" >
            <?php endforeach; ?>
            </form>                                         
        </div>
    </div>
</div>                                                                            
                                                       
                     </td> 
                     
                     <td width="55%" align="center">
                     
                     <div class="docs_proy" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content4" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">PDF</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="home-tab">
                                           
                                           
                                           <?php 
  foreach ($pdf as $sea):
  

  ?> 

                                            <object type="application/pdf" 
data="<?php echo $sea['Arc_Ruta'];?>#toolbar=2&navpanes=1&scrollbar=1" width="100%" height="670" id="pdf"> 

<param name="src" value="<?php echo $sea['Arc_Ruta'];?>" /> 

<p style="text-align:center; width: 60%;">Adobe Reader no se encuentra o la versi&oacute;n no es compatible, utiliza el icono para ir a la p&aacute;gina de descarga <br /> 

<a href="http://get.adobe.com/es/reader/" onclick="this.target='_blank'">
<img src="reader_icon_special.jpg" alt="Descargar Adobe Reader" width="32" height="32" style="border: none;" /></a> 
</p> 
</object>
                  
                  
                  <?php
                  
				  endforeach;
				  ?>                                                  
                                            </div>
                                            
                                  </div>
                               
                                </div>    
                                        </td> 
                                    </tr>
                                     </table> 
                                     <table>
                                    <?php
										foreach ($detos as $t):  
										?>
                                    <tr> 
                                    
                                    <td colspan="2" align="center"> 
                                    
                                  
                              <div class="grid_2" id="aprobar"><button type="button" id="<?= $t['Pro_Codigo'];?>" class="btn btn-round btn-success aprobar"><span class="glyphicon glyphicon-thumbs-up"></span> Aprobar</button></div>
                               <?php
	endforeach;
?> 
     </td><td>
     <?php
										foreach ($dotos as $t):  
										?>
      <div class="grid_2" id="noaprobar"><button type="button" id="<?php echo $t['Pro_Codigo'];?>" class="btn btn-round btn-danger noaprobar"><span class="glyphicon glyphicon-thumbs-down"></span> No Aprobar</button></div>                              

  <?php
	endforeach;
?>              </td><td> 
<?php 
  foreach ($archivopower as $sii):
   ?> 
                                                                                                  
                <a href="<?php echo $sii['Arc_Ruta'];?>"> <button class="btn btn-round btn-info"><i class="fa fa-file-powerpoint-o"></i> Descargar Presentacion Power Point</button></a>            
 <?php
	endforeach;
?>                                                 
			<a href="ConsultarProyectos.php"><button type="button" class="btn btn-round btn-primary">Atras</button></a>
                                   
                                    </td>
                                    </tr>
                                       </table> 				                       
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