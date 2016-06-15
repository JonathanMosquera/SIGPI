<?php
session_start();

session_destroy();
header("location: ../../view/html/Inicio_Sesion.php?m=2")
?>