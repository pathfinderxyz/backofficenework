<?php  
	include '../../coneccion/coneccion.php';
	//include "../../Errores/mostrar_errores.php";


    $nombre_apellido = $_POST['nombre_apellido'];
	$tel = $_POST['tel'];
	$linea_credito = $_POST['linea_credito'];
	$actividad = $_POST['actividad'];
	$ingresos = $_POST['ingresos'];
	$antiguedad = $_POST['antiguedad'];
	$edad = $_POST['edad'];
	$centrales_riesgo = $_POST['centrales_riesgo'];
	$entidad = $_POST['entidad'];
	$plazo_credito = $_POST['plazo_credito'];
	$num_cuota = $_POST['num_cuota'];
	$saldo_capital = $_POST['saldo_capital'];
	$observaciones = $_POST['observaciones'];

    $tipo_cliente='hipotecario';
    $irp = $_POST['irp'];
	$fecha = date ("Y-m-d");



	
	$sql = pg_query("INSERT INTO clientes(nombre_apellido,telefono,linea_credito,actividad,ingresos,antiguedad,edad,centrales_riesgo,entidad,plazo_credito,cuota_anual,saldo_capital,observaciones,tipo_cliente,id_ref_padre) 
		VALUES ('$nombre_apellido','$tel','$linea_credito','$actividad','$ingresos','$antiguedad','$edad','$centrales_riesgo','$entidad','$plazo_credito','$num_cuota','$saldo_capital','$observaciones','$tipo_cliente','$irp')");




   if ($sql) {
		header('Location: ../../dashboard.php?page=hipo&registro=exitoso');//Se guardo
	}else {
		header('Location: ../../dashboard.php?page=hipo&errorusuario=si');//No se guardo el correo o el pasaporte ya existe !
	}
?>          
