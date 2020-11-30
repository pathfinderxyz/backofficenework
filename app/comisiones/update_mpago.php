<?php
  include "../../login/seguridad.php"; 
  include '../../coneccion/coneccion.php';
 
  
  $idactual=$_SESSION['id'];
  $pesos = $_POST['pesos'];
  $btc = $_POST['btc'];
  $wallet = $_POST['wallet'];


    $sql = pg_query("UPDATE usuarios Set mpago_pesos='$pesos',mpagos_btc='$btc',wallet='$wallet'  
    	Where id='$idactual'");


   if ($sql) {
		header('Location: ../../dashboard.php?page=mpagos&registro=exitoso');//Se guardo
	}else {
		header('Location: ../../dashboard.php?page=mpagos&errorusuario=si');//No se guardo el correo o el pasaporte ya existe !
	}

 ?>