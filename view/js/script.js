function consultarPaciente(){
    url="index.php?accion=consultarpaciente&documento="+$("#asignarDocumento").attr("value");
    $("#paciente").load(url);
}


