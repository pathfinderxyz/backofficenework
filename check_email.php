<?php 
include 'coneccion/coneccion.php';


    $correo = (string)$_POST['correo'];
	
	$result = pg_query("SELECT * from usuarios where correo ='$correo'");
	$row = pg_num_rows($result);


    if ($row > 0) {
        echo '<div class="alert alert-danger"><strong>Oh no!</strong>El Correo ya esta siendo usado</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Correo disponible.</div>';
    }

    ?>