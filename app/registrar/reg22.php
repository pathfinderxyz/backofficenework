<?php  
	include '../../coneccion/coneccion.php';


    $patrocinador = $_POST['patrocinador'];
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
	$idrefpadre = $_POST['idrefpadre'];
	$statuspin = 'inactivo';
	$cedula = $_POST['cedula'];
	$bancos = $_POST['bancos'];
	$fecha_nac = $_POST['fecha_nac'];

	
  
	
	$sql = pg_query("INSERT INTO usuarios(usuario,password,rol,patrocinador,nombre,apellido,telefono,pais,correo,fecha,estado_comision,banco,id_refer_padre,statu_pin,cedula,fecha_nac) 
		VALUES ('$usuario','$pass','$rol','$patrocinador','$nombre','$apellido','$tel','$pais','$correo','$fecha','$estado_com','$bancos','$idrefpadre','$statuspin','$cedula','$fecha_nac')");



   if ($sql) {
		header('Location: ../../dashboard.php?page=reg2&registro=exitoso');//Se guardo
	}else {
		header('Location: ../../dashboard.php?page=reg2&errorusuario=si');//No se guardo el correo o el pasaporte ya existe !
	}
?>          
