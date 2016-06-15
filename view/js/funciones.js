$(document).ready(function () {
    //editamos datos del usuario
    $(".editar").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
		 var apellido = $("#apellido" + id).html();
        var rol = $("#rol" + id).html();
		 var correo = $("#correo" + id).html();
        var genero = $("#genero" + id).html();
		 var celular = $("#celular" + id).html();
        var usuario = $("#usuario" + id).html();
		 var contrasena = $("#contrasena" + id).html();
		 var perfil = $("#perfil" + id).html();
      $("<div class='edit_modal'><form name='edit' id='edit' method='post' action='http://localhost:8080/sigpi(jp)/app/control/edit_user.php'>"+
	  		"<div style='text-align:left;'><label> <span style='color:red;'>* Campos Obligatorios</span> </label></div><br>"+
            "<label>Nombres <span style='color:red;'>*</span></label></br><input type='text' name='nombre' class='nombre form-control' value="+nombre+" id='nombre' /><br/>"+ 
			"<input type='hidden' name='id' class='id' id='id' value="+id+">"+
			"<label>Apellidos <span style='color:red;'>*</span></label></br><input type='text' name='apellido' class='apellido form-control' value="+apellido+" id='apellido' /><br/>"+
			"<label>Rol <span style='color:red;'>*</span></label></br><select name='rol' class='rol form-control' id='rol'><option value="+rol+">"+rol+"</option> <option value='COORDINADOR'>COORDINADOR</option> <option value='GESTOR'>GESTOR</option> <option value='INSTRUCTOR'>INSTRUCTOR</option> <option value='LIDER SENNOVA'>LIDER SENNOVA</option> <option value='SUBDIRECTOR'>SUBDIRECTOR</option></select><br/>"+
			"<label>Correo <span style='color:red;'>*</span></label></br><input type='text' name='correo' class='correo form-control' value="+correo+" id='correo' placeholder='Ejemplo@gmail.com'/><br/>"+
			"<label>Género <span style='color:red;'>*</span></label></br><select name='genero' class='genero form-control' id='genero form-control'><option value="+genero+">"+genero+"</option> <option value='FEMENINO'>FEMENINO</option> <option value='MASCULINO'>MASCULINO</option></select><br/>"+
			"<label>Celular <span style='color:red;'>*</span></label></br><input type='text' name='celular' class='celular form-control' value="+celular+" id='celular' /><br/>"+
			"<label>Usuario <span style='color:red;'>*</span></label></br><input type='text' name='usuario' class='usuario form-control' value="+usuario+" id='usuario' /><br/>"+
			"<label>Contraseña <span style='color:red;'>*</span></label></br><input type='password' name='contrasena' class='contrasena form-control' value="+contrasena+" id='contrasena' /><br/>"+
			"<label>Perfil <span style='color:red;'>*</span></label></br><input type='text' name='perfil' class='perfil form-control' value="+perfil+" id='perfil' placeholder='PROFESIÓN U OCUPACIÓN'/><br/>"+
	
    
            "</form> </div>").dialog({
                resizable:false,
                title:'Editar usuario.',
                height:550,
                width:600,
                modal:true,
                buttons:{
                    "Editar":function () {
					  	
					if(edit.nombre.value.length==0) {
					  edit.nombre.focus();
					  $("<div>El campo Nombres no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Nombres no debe estar vacío.");
					  return false;
					  }
					  
					if(edit.apellido.value.length==0) {
					  edit.apellido.focus();
					   $("<div>El campo Apellidos no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Apellidos no debe estar vacío.");
					  return false;
					  }
					  
					if(edit.rol.value=="no") {
					  edit.rol.focus();
					   $("<div>Debe seleccionar un Rol.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("Debe seleccionar un Rol.");
					  return false;
					  }
					  
					if(edit.correo.value.length==0) {
					  edit.correo.focus();
					   $("<div>El campo Correo no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Correo no debe estar vacío.");
					  return false;
					  }
					  
					if(edit.genero.value=="no") {
					  edit.genero.focus();
					   $("<div>Debe seleccionar un Género.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("Debe seleccionar un Género.");
					  return false;
					  }
					  
					if(edit.celular.value.length==0) {
					  edit.celular.focus();
					  $("<div>El campo Celular no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Celular no debe estar vacío.");
					  return false;
					  }
					  
					if(isNaN(edit.celular.value)){
					  edit.celular.focus();
					  $("<div>El campo Celular debe llevar solo numeros.</div>").dialog({
            resizable:false,
            title:'Dilenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Celular debe llevar solo numeros.");
					  return false;
					  }
					  
					if(edit.celular.value.length<10) {
					  edit.celular.focus();
					  $("<div>El campo Celular debe contener al menos 10 digitos.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Celular debe contener al menos 10 digitos.");
					  return false;
					  } 					 					  					
					  
					if(edit.usuario.value.length==0) {
					  edit.usuario.focus();
					  $("<div>El campo Usuario no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Usuario no debe estar vacío.");
					  return false;
					  }
					
					if(edit.contrasena.value.length==0) {
					  edit.contrasena.focus();
					  $("<div>El campo Contraseña no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Contraseña no debe estar vacío.");
					  return false;
					  }
					  
					if(edit.perfil.value.length==0) {
					  edit.perfil.focus();
					  $("<div>El campo Perfil no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Perfil no debe estar vacío.");
					  return false;
					  }
						
                        $.ajax({
                            url : $('#edit').attr("action"),
                            type : $('#edit').attr("method"),
                            data : $('#edit').serialize(),
                            complete:function () {
                                $('.edit_modal').dialog("close");
                                $("<div class='edit_modal'>El usuario fué editado correctamente</div>").dialog({
                                    resizable:false,
                                    title:'Usuario editado.',
                                    height:200,
                                    width:450,
                                    modal:true
                                });
                                setTimeout(function() {
                                    window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Administrador/AgregarUsuario.php";
                              }, 2000);
                           }, error:function (error) {
                                $('.edit_modal').dialog("close");
                                $("<div class='edit_modal'>Ha ocurrido un error!</div>").dialog({
                                    resizable:false,
                                    title:'Error editando!.',
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

	
	//FUNCION PARA CONTAR FILAS TABLA DE RESULTADOS
	/*$(function contar_proy() {
			var $num = document.getElementById('tb_resultados').getElementsByTagName('tr').length - 1;			
			var res = $num;
	        document.getElementById('div_conteo').innerHTML = "<h2>Proyectos encontrados: "+res+"</h2";
		});*/
	

    //eliminamos datos del usuario
    $(".eliminar").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al usuario " + nombre + "?</div>").dialog({
            resizable:false,
            title:'Eliminar al usuario ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{
                "Aceptar":function () {
                    $.ajax({
                        type:'POST',
                        url:'http://localhost:8080/sigpi(jp)/app/control/delete_user.php',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El usuario " + nombre + " fué eliminado correctamente</div>").dialog({
                                resizable:false,
                                title:'Usuario eliminado.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Administrador/AgregarUsuario.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error eliminando al usuario!.',
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
	
	

    //añadimos usuarios nuevos
    $(".agregar").on('click', function () {
        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        $("<div class='insert_modal'><form  name='insert' id='insert' method='post' action='http://localhost:8080/sigpi(jp)/app/control/insert_user.php'>"+
			"<div style='text-align:left;'><label> <span style='color:red;'>* Campos Obligatorios</spam> </label></div><br>"+
			"<label>Identificación <span style='color:red;'>*</span></label> </br><input type='text' name='iden' class='iden form-control' id='iden' /><br/>"+
            "<label>Nombres <span style='color:red;'>*</span></label> </br><input type='text' name='nombre' class='nombre form-control' id='nombre' /><br/>"+
			"<label>Apellidos <span style='color:red;'>*</span></label></br><input type='text' name='apellido' class='apellido form-control' id='apellido' /> <br/>"+
			"<label>Rol <span style='color:red;'>*</span></label></br><select name='rol' class='rol form-control' id='rol'><option value='no'>Seleccione</option>  <option value='COORDINADOR'>COORDINADOR</option> <option value='GESTOR'>GESTOR</option> <option value='INSTRUCTOR'>INSTRUCTOR</option> <option value='LIDER SENNOVA'>LIDER SENNOVA</option> <option value='SUBDIRECTOR'>SUBDIRECTOR</option></select><br/>"+
			"<label>Correo <span style='color:red;'>*</span></label></br><input type='email' name='correo' class='correo form-control' id='correo' placeholder='Ejemplo@gmail.com'/><br/>"+
			"<label>Género <span style='color:red;'>*</span></label></br><select name='genero' class='genero form-control' id='genero'><option value='no'>Seleccione</option> <option value='FEMENINO'>FEMENINO</option> <option value='MASCULINO'>MASCULINO</option></select><br/>"+
			"<label>Celular <span style='color:red;'>*</span></label></br><input type='text' name='celular' class='celular form-control' id='celular' /><br/>"+
			"<label>Usuario <span style='color:red;'>*</span></label></br><input type='text' name='usuario' class='usuario form-control' id='usuario' /><br/>"+
			"<label>Contraseña <span style='color:red;'>*</span></label></br><input type='password' name='contrasena' class='contrasena form-control' id='contrasena' /><br/>"+
			"<label>Perfil <span style='color:red;'>*</span></label></br><input type='text' name='perfil' class='perfil form-control' id='perfil' placeholder='PROFESIÓN U OCUPACIÓN'/><br/>"+
            "</form> </div>").dialog({
            resizable:false,
            title:'Agregar nuevo usuario.',
            height:550,
            width:600,
            modal:true,
            buttons:{
                "Agregar":function () {
										
					if(insert.iden.value.length==0) {
					  insert.iden.focus();
					   $("<div>El campo identificación no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Dilenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Identificación no debe estar vacío.");
					  return false;
					  } 					 
					
					if(isNaN(insert.iden.value)){
					  insert.iden.focus();
					   $("<div>El campo Identificación debe llevar solo numeros.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Identificación debe llevar solo numeros.");
					  return false;
					  }
					  	
					if(insert.nombre.value.length==0) {
					  insert.nombre.focus();
					  $("<div>El campo Nombres no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Nombres no debe estar vacío.");
					  return false;
					  }
					  
					if(insert.apellido.value.length==0) {
					  insert.apellido.focus();
					   $("<div>El campo Apellidos no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Apellidos no debe estar vacío.");
					  return false;
					  }
					  
					if(insert.rol.value=="no") {
					  insert.rol.focus();
					   $("<div>Debe seleccionar un Rol.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("Debe seleccionar un Rol.");
					  return false;
					  }
					  
					if(insert.correo.value.length==0) {
					  insert.correo.focus();
					   $("<div>El campo Correo no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Correo no debe estar vacío.");
					  return false;
					  }
					  
					if(insert.genero.value=="no") {
					  insert.genero.focus();
					   $("<div>Debe seleccionar un Género.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("Debe seleccionar un Género.");
					  return false;
					  }
					  
					if(insert.celular.value.length==0) {
					  insert.celular.focus();
					  $("<div>El campo Celular no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Celular no debe estar vacío.");
					  return false;
					  }
					  
					if(isNaN(insert.celular.value)){
					  insert.celular.focus();
					  $("<div>El campo Celular debe llevar solo numeros.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Celular debe llevar solo numeros.");
					  return false;
					  }
					  
					if(insert.celular.value.length<10) {
					  insert.celular.focus();
					  $("<div>El campo Celular debe contener al menos 10 digitos.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Celular debe contener al menos 10 digitos.");
					  return false;
					  } 					 					  					
					  
					if(insert.usuario.value.length==0) {
					  insert.usuario.focus();
					  $("<div>El campo Usuario no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					 // alert("El campo Usuario no debe estar vacío.");
					  return false;
					  }
					
					if(insert.contrasena.value.length==0) {
					  insert.contrasena.focus();
					  $("<div>El campo Contraseña no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Contraseña no debe estar vacío.");
					  return false;
					  }
					  
					if(insert.perfil.value.length==0) {
					  insert.perfil.focus();
					  $("<div>El campo Perfil no debe estar vacío.</div>").dialog({
            resizable:false,
            title:'Diligenciar el formulario correctamente.',
            height:100,
            width:300,
            modal:true});
					  //alert("El campo Perfil no debe estar vacío.");
					  return false;
					  }
					
                    $.ajax({
                        url : $('#insert').attr("action"),
                        type : $('#insert').attr("method"),
                        data : $('#insert').serialize(),
                        complete:function () {
                            $('.insert_modal').dialog("close");
                            $("<div class='insert_modal'>El usuario fue agregado exitosamente</div>").dialog({
                                resizable:false,
                                title:'Usuario añadido.',
                                height:200,
                                width:450,
                                modal:true
                            });
                            setTimeout(function() {
                                window.location.href = "http://localhost:8080/sigpi(jp)/view/html/Administrador/AgregarUsuario.php";
                            }, 2000);
                        }, error:function (error) {
                            $('.insert_modal').dialog("close");
                            $("<div class='insert_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error añadiendo!.',
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