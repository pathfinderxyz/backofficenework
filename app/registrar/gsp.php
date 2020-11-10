<?php  
	include '../../coneccion/coneccion.php';


    $patrocinador = 'ninguno';
	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$tel = $_POST['tel'];
	$pais = $_POST['pais'];
	$correo = $_POST['correo'];
	$rol = 'referido';
	$estado_com = 'pendiente';
	date_default_timezone_set('America/Asuncion');
	$fecha = date ("Y-m-d");
	$idrefpadre = '0';
	$statuspin = 'inactivo';

	
  
	
	$sql = pg_query("INSERT INTO usuarios(usuario,password,rol,patrocinador,nombre,apellido,telefono,pais,correo,fecha,estado_comision,id_refer_padre,statu_pin) 
		VALUES ('$usuario','$pass','$rol','$patrocinador','$nombre','$apellido','$tel','$pais','$correo','$fecha','$estado_com','$idrefpadre','$statuspin')");




   if ($sql) {
		header('Location: ../../index.php?registro=exitoso');//Se guardo
	}else {
		header('Location: rsp.php?errorusuario=si');//No se guardo el correo o el pasaporte ya existe !
	}
?> 