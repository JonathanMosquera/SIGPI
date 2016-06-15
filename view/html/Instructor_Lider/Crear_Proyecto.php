<?php
require_once '../../../app/modelo/projects.class.php';
$projects = projects::singleton();



session_start();
//si la sesion esta creada
if(isset($_SESSION['autenticado'])&& $_SESSION['autenticado']==true && $_SESSION['jona']['rol']=="INSTRUCTOR") {
if (isset($_POST['Nombre_proyecto']) && $_POST["grabar"]=="si")
{
	
	$do = $_SESSION['jona']['identi'];
	$projects->insert_pro($do);

	exit;	
}

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
	<link href="../../css/jquery-ui.css" rel="stylesheet">
	<link href="../../css/estilos.css" rel="stylesheet">

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
                    
                      
						<!--<div>
                         <ul class="nav side-menu">
                         <li><div class="nav toggle">
                            <a id="menu_toggle"><img src="../../../trespuntos.svg" width="30px" ></i></a>
                        </div></li> 
                         </ul>
                     </div>-->
                      
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
                <div class="nav toggle">        
                                <button class="c-hamburger c-hamburger--htla" id="menu_toggle">
                                  <span>toggle menu</span>
                                </button>
                             </div>
                    <nav class="" role="navigation">

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
                   <div class="col-lg-9"> CREAR PROYECTO </div>
<div class="col-md-3"><button id="zero" class="btn btn-default source"><span class="glyphicon glyphicon-info-sign"></span> Ejemplos de Presentaciones(PDF y PPTX)</button></div>
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
                                    
  <div class="row cold-md-6 ">
 
</div>               
    <div class="results col-md-offset-3" >
     	
        <form class="form-horizontal text-left" role="form" method="post" enctype="multipart/form-data">
         <div class="form-group">
        <div class="col-lg-2">
         </div>
         <label style="align-content:center;">Todos los campos que contengan ( * ) son obligatorios.</label><br>
         </div>
            <div class="form-group">
           <label class="col-lg-2 control-label left">Nombre</label>
                    <div class="col-lg-3">
                        <input type="text" class="jonaT" id="Nombre_proyecto" name="Nombre_proyecto" placeholder="Nombre Proyecto     *" required>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Descripcion</label>
                    <div class="col-lg-3">
                        <textarea class="jona" id="Descripcion_Proyecto" name="Descripcion_Proyecto" placeholder="Descripcion del Proyecto     *" required></textarea>
                    </div>
                    
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Justificacion</label>
                    <div class="col-lg-3">
                        <textarea class="jona" id="Justifi_Proyecto" name="Justifi_Proyecto" placeholder="Justificacion del Proyecto     *" required></textarea>
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Intervalo</label>
                    <div class="col-lg-3">
                       <!-- <input type="text" class="form-control" id="Intervalo_Proyecto" name="Intervalo_Proyecto" placeholder="Intervalo del Proyecto" required>-->
                        
                        <select required name='Intervalo_Proyecto' class='jonaT' id='Intervalo_Proyecto' >
                        <option value=''>Seleccione     *</option> 
                        <option value='Largo Plazo'>Largo Plazo</option>
                         <option value='Mediano Plazo'>Mediano Plazo</option>
                         <option value='Corto Plazo'>Corto Plazo</option>
                         </select>
                        
                        
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Presupuesto</label>
                    <div class="col-lg-3">
                        <input type="text" class="jonaT"  id="Presu_Proyecto" name="Presu_Proyecto" placeholder="Presupuesto del proyecto     *" required onkeypress="return justNumbers(event);"> 
                    </div>
               
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Ficha</label>
                    <div class="col-lg-3">
                        <input type="text" class="jonaT" id="Ficha_Proyecto" name="Ficha_Proyecto" placeholder="numero de la ficha del curso     *" required onkeypress="return justNumbers(event);">
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">centro</label>
                    <div class="col-lg-3">
                      <select required name='Centro_Proyecto' class='jonaT' id='Centro_Proyecto' >
                        <option value=''>Seleccione     *</option> 
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
            
             <div class="form-group">
                <label class="col-lg-2 control-label">Fecha Fin</label>
                    <div class="col-lg-3">
                        <input type="date" class="jonaT" id="Fechafin_Proyecto" name="Fechafin_Proyecto" placeholder="Fecha fin del Proyecto     *" required>
                    </div>
            </div>
            
            
         <div class="form-group">
            <label class="col-lg-2 control-label">Adjuntar PDF     *</label>
            
            <div class="col-lg-3 drag-drop">
				<!--prueba modificar boton file-->
            <input type="file" multiple name="arpdf[]" id="arpdf" required onchange="control(this)"/>
                  
                <!--fin prueba boton file-->
 			</div>
    </div>
   		<div class="form-group">
            <label class="col-lg-2 control-label">Adjuntar Power Point     *</label>
            <div class="col-lg-3 drag-drop">
				<!--prueba modificar boton file-->
                  <input type="file" multiple name="arpdf[]" id="arpdf" required  onchange="central(this)"/>
                 </div>
     </div>
     
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
 			
            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="grabar" value="si"/>                
                    <input type="submit" class="btn btn-success btn-round" id="submit" value="Guardar" title="Guardar">
                </div>
            </div>
        </form>
        
   
        </div>
</div> 			
                                <!--EN MEDIO DE ESTAS ETIQUETAS DIV CON class="x_content" DEBE IR EL CONTENIDO-->
                                <div class="modal fade" id="meumodal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ejemplos de Presentaciones(PDF y PPTX)</h4>
</div>
<div class="modal-body">
<label>Debes descargar los dos archivos.</label>
 <table class="table-responsive">
    <tr>
    <td ><label> Presentacion de propuesta de Proyecto en PDF: &nbsp;</label></td>
    <td>
     <a target="_blank" href="../../docs/Proyecto Semilleros ADSI (Software para registro de objetos (S.R.O)).pdf"> <button class="btn btn-round btn-danger " style="width:200px">PDF</button></a>
     </td>
     </tr>
     <tr>
     <td><label> Presentacion de Proyecto en PowerPoint:</label></td>
     <td>
      <a href="../../docs/SISTEMA INTEGRADO DE GESTIÓN DE PROYECTOS DE INVESTIGACIÓN.pptx"> <button class="btn btn-round btn-warning" style="width:200px">PowerPoint</button></a>
      </td>
      </tr>
      </table>
   
</div>
<div class="modal-footer">
<form name="form2" action="" method="post">
<input type="hidden" name="grabaras" value="si"/>
<input type="hidden" name="veras" value="<?php  echo $ro=$_SESSION['jona']['identi']; ?>"/>
<button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
</form>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!----------------------------------------------------------------------------------------------------------------->
                                        
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
    <script src="js/jquery-2.1.4.js"></script>
     <script src="js/main.js"></script>
     
       <script type="text/javascript">
$(document).ready(function () {
    //editamos datos del usuario
    $("#zero").on('click', function () {
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
</body>

</html>

<?php
}
else {
    echo "Error, no tienes permiso.";
	header("location: ../Inicio_Sesion.php?m=3");
}
?>