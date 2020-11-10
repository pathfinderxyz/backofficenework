<?php  
	include '../../coneccion/coneccion.php';


   
    $idp = $_POST['idprom'];

	
  
	
	$sql = pg_query("DELETE FROM incentivos Where id_promo='$idp'");

	
	

    if ($sql) {
		header('Location: ../../dashboard.php?page=verpromo');//Se guardo
	}

 
?>    