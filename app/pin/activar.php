<?php

  include '../../login/seguridad.php';
  include '../../coneccion/coneccion.php';
  
  $idactual=$_SESSION['id'];


    $sql = pg_query("UPDATE usuarios Set statu_pin='".$_GET['pagopayu']."' Where id='$idactual'");


    if ($_GET["pagopayu"]=="activado"){
		header('Location: ../../dashboard.php?page=pagopin');
	}else {
		header('Location: ../../dashboard.php?page=pagopin&registro=fallido');
	}

 ?>
 <!--Enlace de activacion-->
 <!-- http://localhost/backofficenework/app/pin/activar.php?pagopayu=activado -->

 <!--Enlace de para desactivar-->
 <!-- http://localhost/backofficenework/app/pin/activar.php?pagopayu=inactivo -->


