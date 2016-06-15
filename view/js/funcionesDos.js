// Aprobar un proyecto LiderSennova
$(document).ready(function () {
$(".aprobar").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombro" + id).html();
        $("<div class='delete_modal'>¡Estás seguro que deseas Aprobar el Proyecto " + nombre + "?</div>").dialog({
            resizable:false,
            title:'Aprobar el Proyecto ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{
                "Aceptar":function () {
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8080/sigpi(jp)/app/control/proyecto_aprobar.php',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El Proyecto " + nombre + " fué Aprobado</div>").dialog({
                                resizable:false,
                                title:'Proyecto Aprobado.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Lider_Sennova/ConsultarProyectos.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error Aprobando el Proyecto!.',
                                height:200,
                                width:450,
                                modal:true
                            });
                        }
                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });
	
	// Aprobar un proyecto LiderSennova
	$(".aprobarg").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombro" + id).html();
        $("<div class='delete_modal'>¡Estás seguro que deseas Aprobar el Proyecto " + nombre + "?</div>").dialog({
            resizable:false,
            title:'Aprobar el Proyecto ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{
                "Aceptar":function () {
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8080/sigpi(jp)/app/control/proyecto_aprobargestor.php',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El Proyecto " + nombre + " fué Aprobado</div>").dialog({
                                resizable:false,
                                title:'Proyecto Aprobado.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Gestor_Proyectos/ConsultarProyectos.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error Aprobando el Proyecto!.',
                                height:200,
                                width:450,
                                modal:true
                            });
                        }
                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });

	//No Aprobar un Proyecto
	
// JavaScript Document
$(".noaprobar").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombro" + id).html();
        $("<div class='delete_modal'>¡Estás seguro que deseas No Aprobar el Proyecto " + nombre + "?</div>").dialog({
            resizable:false,
            title:'No Aprobar el Proyecto ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{
                "Aceptar":function () {
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8080/sigpi(jp)/app/control/proyecto_noaprobar.php',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El Proyecto " + nombre + " No fué Aprobado</div>").dialog({
                                resizable:false,
                                title:'Proyecto Aprobado.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Lider_Sennova/ConsultarProyectos.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error Para No Aprobar el Proyecto!.',
                                height:200,
                                width:450,
                                modal:true
                            });
                        }
                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });



//Eliminar el proyecto

$(".eliminarpr").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombro" + id).html();
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar el Proyecto " + nombre + "?</div>").dialog({
            resizable:false,
            title:'Eliminar el Proyecto ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{
                "Aceptar":function () {
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8080/sigpi(jp)/app/control/delete_proyectgestor.php',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El Proyecto " + nombre + " fué eliminado correctamente</div>").dialog({
                                resizable:false,
                                title:'Proyecto eliminado.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Gestor_Proyectos/ConsultarProyectos.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error eliminando el Proyecto!.',
                                height:200,
                                width:450,
                                modal:true
                            });
                        }
                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });

});