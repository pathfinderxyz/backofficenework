<?php
     include ("../../errores/mostrar_errores.php");
     include ("../../coneccion/coneccion.php");

     $titulo = $_POST['titulo'];
     $descripcion = $_POST['descripcion'];

     // Recibo los datos de la imagen (ruta y nombre)
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/backofficenework/assets/img/';
      $ruta = $_FILES['imagen']['tmp_name'];
      $nombre_img = $_FILES['imagen']['name'];
      $ruta_real= 'assets/img/';
      $url_imagen = $ruta_real.$nombre_img;
     
       
      $sql = pg_query("insert into incentivos (titulo,descripcion,url_imagen) values ('$titulo','$descripcion','$url_imagen')");

      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

    echo $directorio;
?>
