<?php  
	include '../../coneccion/coneccion.php';
	//include "../../Errores/mostrar_errores.php";


    $nombre_apellido = $_POST['nombre_apellido'];
	$tel = $_POST['tel'];
	
	$actividad = $_POST['actividad'];
	$ingresos = $_POST['ingresos'];
	
	
	$entidad = $_POST['entidad'];
	$plazo_credito = $_POST['plazo_credito'];
	$num_cuota = $_POST['num_cuota'];
	$saldo_capital = $_POST['saldo_capital'];
	$observaciones = $_POST['observaciones'];

    $tipo_cliente='reduccion';
	$fecha = date ("Y-m-d");
	$irp = $_POST['irp'];



	
	$sql = pg_query("INSERT INTO clientes(nombre_apellido,telefono,actividad,ingresos,entidad,plazo_credito,cuota_anual,saldo_capital,observaciones,tipo_cliente,id_ref_padre,fecha_creacion) 
		VALUES ('$nombre_apellido','$tel','$actividad','$ingresos','$entidad','$plazo_credito','$num_cuota','$saldo_capital','$observaciones','$tipo_cliente','$irp','$fecha')");




   if ($sql) {
		header('Location: ../../dashboard.php?page=reduccion&registro=exitoso');//Se guardo
	}else {
		header('Location: ../../dashboard.php?page=reduccion&errorusuario=si');//No se guardo el correo o el pasaporte ya existe !
	}
?>          
