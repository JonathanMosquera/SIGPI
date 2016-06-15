<?php
require_once '../../../app/modelo/projects.class.php';

$projects = projects::singleton();
$projects->insert_comment();


  $nom = $_REQUEST["m"];
  $si = $_REQUEST["m"];
   $archivo = $projects->archivo_pdfs($si);
   $archivopower= $projects->archivo_pptx($si);
  $datos = $projects->info_Proyecto($nom);
  $detes = $projects->informacion_Proyecto($nom);
  $dutos = $projects->responsable_Proyecto($nom);
  $ditos = $projects->miembros_Proyecto($nom);
  $comentarios = $projects->view_comentarios($nom);
					 
					 if (isset($_POST['procod_editar']) && $_POST["grabar"]=="si")
{	
	$projects->edit_pro();
	exit;	
}
					 
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
                                  </li> -->                             
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
foreach ($datos as $dt):
?>
                       <tr>
                       	    <td width="200px"><b>CODIGO:</b></td>
                           <td><?php echo $dt['Pro_Codigo'];?></td>                     
                       </tr>
                       <tr>
                       	   <td><b>NOMBRE:</b></td>                       		
                           <td id="nombre<?=$fila['Pro_Nombre']?>"><?php echo $dt['Pro_Nombre'];?></td>
                       </tr>
                       <tr>
                       	   <td><b>DESCRIPCIÓN:</b></td>                       		
                           <td><?php echo $dt['Pro_Descripcion'];?></td>
                       </tr>
                       <tr>
                       	   <td><b>RESPONSABLE:</b></td>                       		
                           <td><?php echo $dt['Per_Nombre']." ".$dt['Per_Apellido'];?></td>
                       </tr> 
                       <tr>
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
                           <td><?php echo $dt['Pro_Condicion'];?></td>
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
  foreach ($archivo as $sea):
   

  ?> 
                                            <object type="application/pdf" 
data="<?php echo $sea['Arc_Ruta'];?>#toolbar=2&navpanes=1&scrollbar=1" width="100%" height="670" id="pdf" > 

<param name="src" value="<?php echo $sea['Arc_Ruta'];?>"  /> 

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
                                    
                                    
                                    <tr> 
                                    <td colspan="2" align="center"><button id="editar_btn" class="btn btn-round btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Proyecto</button> 
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
                                     <div class="modal fade" id="meumodal">
<div class="modal-dialog">
<div class="modal-content">
<form class="form-horizontal text-left" role="form" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4 class="modal-title">Editar Proyecto</h4>
</div>
<div align="center" class="modal-body">
 <div class="table-responsive">        
    <?php
    foreach($datos as $dato):	
	?>
            <div class="form-group">
                <label class="col-lg-2 control-label left">Nombre</label>
                    <div class="col-lg-10">
                        <input type="text" value="<?php echo $dato["Pro_Nombre"];?>" class="form-control" id="Nombre_proyecto" name="Nombre_proyecto" placeholder="Nombre Proyecto" required>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Descripcion</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="Descripcion_Proyecto" name="Descripcion_Proyecto" placeholder="Descripcion del Proyecto" required><?php echo $dato["Pro_Descripcion"];?></textarea>
                    </div>
                    
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Justificacion</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="Justifi_Proyecto" name="Justifi_Proyecto" placeholder="Justificacion del Proyecto" required><?php echo $dato["Pro_Justificacion"];?></textarea>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Intervalo</label>
                    <div class="col-lg-10">
                       <!-- <input type="text" class="form-control" id="Intervalo_Proyecto" name="Intervalo_Proyecto" placeholder="Intervalo del Proyecto" required>-->
                        
                        <select required name='Intervalo_Proyecto' class='form-control' id='Intervalo_Proyecto' >
                        <option value='<?php echo $dato["Pro_Intervalo"];?>'><?php echo $dato["Pro_Intervalo"];?></option> 
                        <option value='Largo Plazo'>Largo Plazo</option>
                         <option value='Mediano Plazo'>Mediano Plazo</option>
                         <option value='Corto Plazo'>Corto Plazo</option>
                         </select>
                        
                        
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Presupuesto</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?php echo $dato["Pro_Presupuesto"];?>" id="Presu_Proyecto" name="Presu_Proyecto" placeholder="Presupuesto del proyecto" required onkeypress="return justNumbers(event);"> 
                    </div>
               
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Ficha</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?php echo $dato["Pro_Ficha"];?>" id="Ficha_Proyecto" name="Ficha_Proyecto" placeholder="Numero de la ficha del curso" required onkeypress="return justNumbers(event);">
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Centro</label>
                    <div class="col-lg-10">
                    <select required name='Centro_Proyecto' class="form-control col-md-7 col-xs-12" id='Centro_Proyecto' >
                             
                            <option value='<?php echo $dato["Pro_Centro"];?>'><?php echo $dato["Pro_Centro"];?></option>
                            <option value='CTPI'>Centro de Teleinformatica y Producción Industrial</option>
                         <option value='CCS'>Centro de Comercio y Servivios</option>
                         <option value='CA'>Centro Agropecuario</option>
                    
                             </select>
                        
                    </div>
            </div>
            
                       <!-- <div class="form-group">
                <label class="col-lg-2 control-label">Fecha Inicio</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="Fechaini_Proyecto" name="Fechaini_Proyecto" placeholder="Fecha inicio del proyecto" >
                    </div>
            </div>--->
     
  <script type="text/javascript">
     
    function control(f){
    var ext=['pdf'];
    var a=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==a)
            return
    }
    var t=f.cloneNode(false);
    t.value='';
    f.parentNode.replaceChild(t,f);
    $("<div>porfavor insertar solo archivos pdf.</div>").dialog({
            resizable:false,
            title:'Archivos.',
            height:100,
            width:300,
            modal:true});;}
			
	</script>
    <script type="text/javascript">
	function central(e){
    var soo=['pptx','ppt'];
    var v=e.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=soo[i];i++){
        if(n.toLowerCase()==v)
            return
    }
    var s=e.cloneNode(false);
    s.value='';
    e.parentNode.replaceChild(s,e);
    $("<div>porfavor insertar solo archivos Power Point.</div>").dialog({
            resizable:false,
            title:'Archivos.',
            height:100,
            width:300,
            modal:true});;}

     </script>
	</script>
                  
                <!--fin prueba boton file-->       
      </div>
   
</div>
<div class="modal-footer">
<input type="hidden" name="grabar" value="si"/>   
<input type="hidden" name="procod_editar" value="<?php echo $dato['Pro_Codigo'];?>"/>
<?php
	endforeach;
?>                            
                    <a><button type="submit" class="btn btn-round btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button></a><a><button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cancelar</button></a>
                    

</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
                                      
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
    <?php
if (isset($_GET["n"]) and ($_GET["n"])==1)
{
	?>
    <script type="text/javascript">
$(document).ready(function()
{
	new PNotify({
                                title: 'Proyecto Actualizado',
                                text: '<div  style=\'color:#000000; border-radius:10px; width:20px; height:20px; float:left; margin-right:10px;\'></div> <div style=\'float:left;\'> <b>Tu Proyecto se ha modificado exitosamente.</b></div>',
                                type: 'success'
                            });

//$("#meumodal2").modal("show");
});
</script>
    <?php } ?>
    
    <script type="text/javascript">
$(document).ready(function () {
    //editamos datos del usuario
    $("#editar_btn").on('click', function () {
$("#meumodal").modal("show");
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
</body>

</html>

<?php
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>